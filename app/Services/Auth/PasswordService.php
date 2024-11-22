<?php

namespace App\Services\Auth;

use App\Models\Admin;
use App\Notifications\dashboard\SendOtpNotify;
use App\Repositories\Auth\PasswordRepository;

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

        $admin->notify(new SendOtpNotify());
        return $admin;
    }

    public function verifyOtpEmail($email , $otp)
    {
        $otp2 =  $this->passwordRepository->verifyOtpEmail($email , $otp);
        return $otp2->status;
    }
    public function resetPassword($email , $password)
    {
        $admin =  $this->passwordRepository->resetPassword($email , $password);
        return $admin;
    }
}
