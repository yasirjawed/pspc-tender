<?php

namespace App\Http\Controllers\frontend\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\Vendor;
use Auth;
use Crypt;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Mail;
class VendorAuthenticator extends Controller
{
    public function showLoginForm() : View
    {
        return view('frontend.authentication.login');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        try {
            $user = Vendor::where('email', $request->email)->first();
            if(! $user){
                return redirect()->route('web.vendor.authentication.login')->with('error','User Not Found!');
            }
            if($user->is_verified!=1){
                return redirect()->route('web.vendor.authentication.verification-page',Crypt::encrypt($user->id))->with('success','Kindly verify your account with the sent email.');
            }
            if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('/')->with('success','Vendor successfully logged in');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function showRegisterForm() : view
    {
        return view('frontend.authentication.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'cnic' => ['required', 'unique:vendors', 'max:15'],
            'email' => ['required'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        try {
            $vendor = Vendor::create([
                'cnic' => $validatedData['cnic'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
            ]);
            return redirect()->route('web.vendor.authentication.login')->with('success', 'Registration successful! Please login.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again.');
        }
    }

    public function showVerificationPage($UserID){
        try {
            $decryptedId = Crypt::decrypt($UserID);
            $user = Vendor::where('id',$decryptedId)->first();
            if(!$user || $user->is_verified == 1){
                return redirect()->route('web.index')->with('error', 'An error occured!');
            }
            return view('frontend.authentication.verification',compact('user'));
        } catch (\Exception $e) {
            return redirect()->route('web.index')->with('error', 'An error occured!');
        }
    }

    public function logout(){
        try {
            Auth::guard('vendor')->logout();
            return redirect()->route('web.vendor.authentication.login')->with('success', 'You have been logged out successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred during logout. Please try again.');
        }
    }

    public function showForgetPasswordForm() : view
    {
        return view('frontend.authentication.forget-password');
    }

    public function forgetPassword(Request $request)
    {
        try {
            $request->validate(['email' => 'required|email|exists:vendors,email']);
            $token = Str::random(60);
            DB::table('password_resets')->updateOrInsert(
                ['email' => $request->email],
                ['token' => $token, 'created_at' => now()]
            );
            $resetLink = route('web.vendor.authentication.password-reset', $token);
            Mail::send('mails.password_reset', ['link' => $resetLink], function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('Password Reset Link');
            });
            return redirect('/')->with('success','Password reset link sent to your email!');
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'An error occured!');
        }
    }

    public function showResetForm($token) : view
    {
        return view('frontend.authentication.reset-password', ['token' => $token]);
    }

    public function ResetPassword(Request $request){
        // try{
            $request->validate([
                'email' => 'required|email|exists:vendors,email',
                'password' => 'required|confirmed|min:8',
                'token' => 'required'
            ]);
            $reset = DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->first();
            if (!$reset) {
                return back()->withErrors(['email' => 'Invalid or expired token.']);
            }
            $vendor = Vendor::where('email', $request->email)->first();
            $vendor->password = Hash::make($request->password);
            $vendor->save();
            DB::table('password_resets')->where('email', $request->email)->delete();
            return redirect()->route('web.vendor.authentication.login')->with('success','Password has been reset!');
        // } catch (\Exception $e) {
        //     return redirect('/')->with('error', 'An error occured!');
        // }
    }
}
