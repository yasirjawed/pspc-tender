<div>
    <div data-mdb-input-init class="input-container mb-2">
        <input wire:model.live="otpInput" placeholder="Enter Verification Code" class="input-field" type="text" name="email" required>
        <span class="input-highlight"></span>
    </div>
    <div class="text-center pt-1 mb-1 mt-1 pb-1">
        <button wire:click="verifyOtp" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block w-100" type="submit">Verify Account</button>
    </div>
    <div class="text-center pt-1 mb-1 mt-1 pb-1">
        <button wire:click="sendOtp" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block w-100" type="button">Resend OTP</button>
    </div>
</div>
