<button class="btn btn-sm btn-primary edit_coupon"
        data-coupon-id="{{$coupons->id}}"
        data-coupon-code = "{{$coupons->code}}"
        data-coupon-discount_percentage = "{{$coupons->discount_percentage}}"
        data-coupon-limit = "{{$coupons->limit}}"
        data-coupon-time_used = "{{$coupons->time_used}}"
        data-coupon-start_at = "{{$coupons->start_at}}"
        data-coupon-end_at = "{{$coupons->end_at}}"
        data-coupon-is_active = "{{$coupons->is_active}}"
        data-coupon-note = "{{$coupons->note}}"

    data-toggle="modal"
   data-target="#editcoupon"
   title="Coupon Edit"><i class="ft-edit"></i>
</button>
{{--
<a class="btn btn-sm btn-warning change_status change-status-btn"  cat_id="{{$brands->id}}"
   href="{{route('dashboard.brands.status',$brands->id)}}"
   title="Role change status">  <i class="ft-toggle-right"></i>
</a>--}}

<a class="btn btn-sm btn-danger delete_coupon" coupon_id="{{$coupons->id}}"
   href="{{route('dashboard.coupons.destroy',$coupons->id)}}"
   title="coupon delete"><i class="ft-trash"></i>
</a>



