<?php

namespace App\Http\Controllers\Dashboard\Auth\forgetPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\auth\ResetPasswordRequest;
use App\Models\Admin;
use App\Services\Auth\PasswordService;
use Ichtrojan\Otp\Otp;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;

class ResetPasswordController extends Controller
{
    private $otp;
    protected $passwordService;
    public function __construct(PasswordService  $passwordService)
    {
        $this->otp = new Otp;
        $this->passwordService = $passwordService;
    }

    public function getResetPassword($email){

        return view('dashboard.auth.forgetPassword.reset', compact('email'));
    }
    public function resetPassword(ResetPasswordRequest $request){

        $admin = $this->passwordService->resetPassword($request->email , $request->password);
        if (!$admin){
            return redirect()->back()->withErrors('error', 'try again later');
        }
        return redirect()->route('dashboard.login')->with('success', 'Password reset successfully');
    }

}
