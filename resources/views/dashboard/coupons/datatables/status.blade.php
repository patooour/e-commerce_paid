<div id="status_{{$coupons->id}}" @if($coupons->is_active == 1) class="text-success" @else class="text-danger" @endif>
    {{$coupons->is_active == 1 ? 'Active' : 'Inactive' }}
</div>
