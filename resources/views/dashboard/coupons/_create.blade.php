
    {{--start modal--}}
    <div class="row">
        <div class="col-md-6">
            <a href="" class="btn btn-outline-success mt-2 " data-toggle="modal"
               data-target="#add-coupon">{{__('coupon.add')}}</a>
        </div>
    </div>

    <div class="modal addcoupon fade text-left" id="add-coupon" tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel2"
         aria-hidden="true">
        <div class="modal-dialog" id="addcoupon" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2"><i
                            class="la la-road2"></i> {{__('coupon.add')}}</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>


                <form class="form coupon_form" id="coupon_create" action="{{route('dashboard.coupons.store')}}"
                      method="post" >
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-danger" id="error_div" style="display: none">
                            <ul id="error_ul">
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput1">Code</label>
                                    <input type="text" id="code"
                                           class="form-control"
                                           name="code">

                                    <strong class="text-danger" id="error_code"></strong>

                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="discount_percentage">Discount</label>
                                    <input type="number" id="discount"
                                           class="form-control"

                                           name="discount_percentage">
                                    <strong class="text-danger" id="error_discount_percentage"></strong>
                                </div>

                            </div>

                        </div>
                        <div class="row mt-1">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput1">Limitation</label>
                                    <input type="number" id="limit"
                                           class="form-control"
                                           name="limit">
                                    <strong class="text-danger" id="error_limit"></strong>

                                </div>
                                <div class="form-group">
                                    <label for="projectinput1">start Date</label>
                                    <input type="date" id="limit"
                                           class="form-control"
                                           name="start_at">
                                    <strong class="text-danger" id="error_start_at"></strong>

                                </div>
                                <div class="form-group">
                                    <label for="projectinput1">end Date</label>
                                    <input type="date" id="limit"
                                           class="form-control"
                                           name="end_at">
                                    <strong class="text-danger" id="error_end_at"></strong>

                                </div>
                                <div class="form-group">
                                    <label for="note">note</label>
                                    <input type="text" id="discount"
                                           class="form-control"
                                           name="note">
                                    <strong class="text-danger" id="error_note"></strong>

                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h5>
                                                <strong>is Active </strong>
                                            </h5>
                                            <div class="controls">
                                                <input type="checkbox" checked name="is_active" class="switchery" >
                                                <span class="ml-1">Active</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-outline-primary">Create
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{--end modal--}}

