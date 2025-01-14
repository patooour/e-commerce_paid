<?php

namespace App\Http\Controllers\Dashboard\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\home\CouponRequest;
use App\Services\Home\CouponService;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $couponService;
    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.coupons.index');
    }
    public function getAll()
    {
        return $this->couponService->getAll();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponRequest $request)
    {
        $data = $request->only(['code' , 'limit','discount_percentage','start_at','end_at', 'is_active']);
        if (!$this->couponService->create($data)){
            return response()->json([
                'status' => false,
                'msg'=>'try again later',
                'data'=>null
            ],500);
        };
        return response()->json([
            'status' => 'success',
            'msg'=>'coupon added successfully',
            'data'=>$data
        ],500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, string $id)
    {

        $data = $request->except(['_method', '_token']);

       if (!$this->couponService->update($id , $data)){
           return response()->json([
               'status' => false,
               'msg'=>'try again later',
               'data'=>null
           ],500);
       }
       return response()->json([
           'status' => 'success',
           'msg'=>'coupon updated successfully',
           'data'=>$data
       ],200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        if (!$this->couponService -> delete($id)){
            return response()->json([
                'status' => false,
                'msg'=>'try again later',
                'data'=>null
            ],500);
        }
        return response()->json([
            'status' => 'success',
            'msg'=>'coupon deleted successfully',
            'data'=>null
        ],200);
    }
}
