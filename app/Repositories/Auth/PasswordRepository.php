<?php

namespace App\Repositories\Auth;

use App\Models\Admin;
use Ichtrojan\Otp\Otp;

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

    public function verifyOtpEmail($email , $otp)
    {
        $otp2 = $this->otp->validate($email , $otp);
        return $otp2;
    }
    public function resetPassword($email , $password)
    {
        $admin = self::getAdminByEmail($email);
        $admin = $admin->update([
            'password'=>bcrypt($password)
        ]);
        return $admin;
    }
}
