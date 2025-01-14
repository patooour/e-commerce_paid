<?php

namespace App\Repositories\Home;

use App\Models\Coupon;
use Yajra\DataTables\Facades\DataTables;

class CouponRepository
{
    /**
     * Create a new class instance.
     */
    public function getCoupon($id)
    {
        $coupon = Coupon::find($id);
        return $coupon;
    }
    public function getAll()
    {
        $coupons = Coupon::latest()->get();

        $coupons =  Datatables::of($coupons)
            ->addIndexColumn()
            ->addColumn('code' ,function($coupons){
                return $coupons->code;
            })
            ->addColumn('discount_percentage' ,function($coupons){
                return $coupons->discount_percentage ."%";
            })
            ->addColumn('limit' ,function($coupons){
                return $coupons->limit;
            })
            ->addColumn('time_used' ,function($coupons){
                return $coupons->time_used;
            })
            ->addColumn('is_active' ,function($coupons){
                return view('dashboard.coupons.datatables.status' , compact('coupons'));
            })
            ->addColumn('start_at' ,function($coupons){
                return $coupons->start_at;
            })
            ->addColumn('end_at' ,function($coupons){
                return $coupons->end_at;
            })
            ->addColumn('created_at' ,function($coupons){
                return $coupons->created_at;
            })
            ->addColumn('actions' ,function($coupons){
                return view('dashboard.coupons.datatables.actions' , compact('coupons'));
            })

            ->make(true);
        return $coupons;
    }
    public function create($data){

        $coupon = Coupon::create($data);
        return $coupon;

    }
    public function update($coupon,$data)
    {
        $coupon->update($data);
        return $coupon;
    }
    public function delete($coupon)
    {
        $coupon->delete();
        return $coupon;
    }


}
