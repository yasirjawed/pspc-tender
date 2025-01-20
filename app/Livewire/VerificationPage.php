<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use App\Models\Vendor;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\RateLimiter;

class VerificationPage extends Component
{
    public $otpInput;
    protected $otp;
    public $user;
    public $resendAvailableAt;
    public $emailSent = false;


    public function mount($user)
    {
        $this->user = $user;
        $this->sendOtp();
    }

    public function sendOtp()
    {
        if (RateLimiter::tooManyAttempts('otp-send-' . $this->user->id, 1)) {
            $seconds = RateLimiter::availableIn('otp-send-' . $this->user->id);
            $this->dispatch('error',['msg'=>"Please wait $seconds seconds before requesting another OTP."]);
            return;
        }
        $this->otp = rand(100000, 999999);
        Cache::put('otp_' . $this->user->id, $this->otp, now()->addMinutes(2));
        Mail::to($this->user->email)->send(new VerificationMail($this->user,$this->otp));
        $this->emailSent = true;
        $this->resendAvailableAt = now()->addSeconds(90);
        RateLimiter::hit('otp-send-' . $this->user->id, 90);
        $this->dispatch('success',['msg'=>"Verification email has been sent!"]);
    }

    public function verifyOtp()
    {
        $cachedOtp = Cache::get('otp_' . $this->user->id);
        if ($this->otpInput == $cachedOtp) {
            Cache::forget('otp_' . $this->user->id);
            $this->user->is_verified = 1;
            $this->user->save();
            return redirect()->route('web.vendor.authentication.login')->with('success','Your account is verified now, Kindly login');
        } else {
            $this->dispatch('error',['msg'=>"Wrong OTP!"]);
        }
    }

    public function render()
    {
        return view('livewire.verification-page');
    }
}
