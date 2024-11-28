<?php

namespace App\Http\Controllers\Dashboard\Auth\forgetPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\auth\ForgetPasswordRequest;
use App\Models\Admin;
use App\Notifications\dashboard\SendOtpNotify;
use App\Services\Auth\PasswordService;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    private $otp;
    protected $passwordService;
    public function __construct(PasswordService $passwordService)
    {
        $this->otp = new Otp;
        $this->passwordService = $passwordService;
    }

    public function showForgetPassword()
    {
        return view('dashboard.auth.forgetPassword.confirm');
    }

    public function sendMail(ForgetPasswordRequest $request){
        $admin = $this->passwordService->getAdminByEmail($request->email);
        $admin->notify(new SendOtpNotify());
        if (!$admin) {  return redirect()->back()->withErrors(['error'=>'admin was not found']);  }
        return redirect()->route('dashboard.verifyOtp',$admin->email);
    }

    public function verifyOtp($email)
    {
        $admin = $this->passwordService->getAdminByEmail($email);
        $token = $admin->token;
        return view('dashboard.auth.forgetPassword.verify',
            compact('email', 'token'));
    }

    public function verifyOtpEmail(ForgetPasswordRequest $request){
        $otp2 = $this->passwordService->verifyOtpEmail($request->email , $request->otp);
        if (!$otp2){
            return redirect()->back()->withErrors(['error' =>'code is invalid']);
        }
        return redirect()->route('dashboard.getResetPassword',[$request->email]);


    }
}
