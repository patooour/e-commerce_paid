<?php

namespace App\Services\Auth;

use App\Models\Admin;
use App\Notifications\dashboard\SendOtpNotify;
use App\Repositories\Auth\PasswordRepository;
use Illuminate\Support\Str;

class PasswordService
{
   protected $passwordRepository;
    public function __construct(PasswordRepository $passwordRepository)
    {
        $this->passwordRepository = $passwordRepository;
    }

    public function getAdminByEmail($email)
    {
        $admin =  $this->passwordRepository->getAdminByEmail($email);
        if (!$admin){
            return false;
        }
        $admin->token = Str::random(64);
        $admin->save();
        return $admin;
    }

    public function verifyOtpEmail($email , $otp)
    {
        $otp2 =  $this->passwordRepository->verifyOtpEmail($email , $otp);
        return $otp2->status;
    }
    public function resetPassword($email , $password  ,$token)
    {
        $admin =  $this->passwordRepository->resetPassword($email , $password ,$token);
        if (!$admin){
            return false;
        }
        return $admin;
    }
    public function getAdminByEmailAndToken($email , $token)
    {
        $admin =  $this->passwordRepository->getAdminByEmailAndToken($email , $token);
        return $admin;
    }
}
