<?php

namespace App\Repositories\Auth;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;
use Illuminate\Support\Str;

class PasswordRepository
{
    protected $otp;
    public function __construct()
    {
        $this->otp = new Otp();
    }

    public function getAdminByEmail($email)
    {
        $admin = Admin::whereEmail($email)->first();
        return $admin;
    }

    public function verifyOtpEmail($email , $otp )
    {
        $admin = self::getAdminByEmail($email);
        $otp2 = $this->otp->validate($email , $otp);
        return $otp2;
    }
    public function resetPassword($email , $password,$token )
    {
        $admin = self::getAdminByEmailAndToken($email ,$token);
        $admin->password = bcrypt($password);
        $admin->token  = null;
        $admin->save();
        return $admin;
    }
    public function getAdminByEmailAndToken($email,$token)
    {
        $admin = Admin::whereEmail($email)->whereToken($token)->first();
        return $admin;
    }
}
