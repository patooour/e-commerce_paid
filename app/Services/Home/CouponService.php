<?php

namespace App\Services\Home;

use App\Models\Coupon;
use App\Repositories\Home\CouponRepository;

class CouponService
{
   protected $couponRepository;
    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    public function getCoupon($id)
    {
        $coupon =  $this->couponRepository->getCoupon($id);
        return $coupon ?? abort(404, 'Coupon not found');
    }
    public function getAll()
    {
        return $this->couponRepository->getAll();
    }
    public function create($data){
        if (isset($data['is_active']) && $data['is_active'] === 'on') {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }
      return $this->couponRepository->create($data);

    }
    public function update($id,$data)
    {
        if (isset($data['is_active']) && $data['is_active'] === 'on') {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }
        $coupon = $this->getCoupon($id);
       $coupon =  $this->couponRepository->update($coupon,$data);
       return $coupon;

    }
    public function delete($id)
    {
        $coupon = $this->getCoupon($id);
        $coupon =  $this->couponRepository->delete($coupon);
        return $coupon;
    }

}
