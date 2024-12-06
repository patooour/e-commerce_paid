{{--start modal--}}
<div class="modal fade text-left" id="iconModal_{{$governorate->id}}" tabindex="-1" role="dialog"
     aria-labelledby="modalLabel_{{$governorate->id}}"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2"><i
                        class="la la-road2"></i>{{__('dashboard.change_price')}}</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                     {{-- apper validations errors --}}
            <div class="alert alert-danger" style="display: none" id="errors_{{ $governorate->id }}"></div>

            <form class="form update_shipping_price" gov_id="{{$governorate->id}}" method="post">
                @csrf
                <input type="hidden" value="{{$governorate->id}}" name="id">
                <div class="modal-body">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="price">{{__('dashboard.select_shipping_price') . ' '}}{{$governorate->name}}</label>
                                <input type="text" id="price"
                                       class="form-control"
                                       value="{{$governorate->shippingPrice->price}}"
                                       name="price">
                                @error('price')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror
                            </div>

                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary"
                            data-dismiss="modal">{{__('dashboard.close')}}
                    </button>
                    <button type="submit" class="btn btn-outline-primary">{{__('dashboard.change_price')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--end modal--}}
