@extends('layouts.dashboard.app')

@section('title')
    {{__('dashboard.coupons')}}
@endsection

@push('css')
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets") }}/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="{{asset("assets") }}/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="{{asset("assets") }}/vendors/css/forms/toggle/bootstrap-switch.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset("assets") }}/vendors/css/forms/toggle/switchery.min.css">
    <!-- END VENDOR CSS-->

    <!-- input-file plugin -->
    <link href="{{asset('assets/plugin/file-input/css/fileinput.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous">
    <!-- end input-file plugin -->

@endpush


@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Create coupon</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href=" {{route('dashboard.coupons.index')}}">{{__('dashboard.coupons')}}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{__('dashboard.create_coupon')}}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="dropdown float-md-right">
                        <button class="btn btn-danger dropdown-toggle round btn-glow px-2" id="dropdownBreadcrumbButton"
                                type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownBreadcrumbButton"><a class="dropdown-item"
                                                                                                 href="#"><i
                                    class="la la-calendar-check-o"></i> Calender</a>
                            <a class="dropdown-item" href="#"><i class="la la-cart-plus"></i> Cart</a>
                            <a class="dropdown-item" href="#"><i class="la la-life-ring"></i> Support</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="la la-cog"></i> Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body ">

                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('dashboard.coupons')}}</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        {{--start modal--}}
                                       @include('dashboard.coupons._create')
                                        {{--end modal--}}

                                        {{--start modal--}}
                                        @include('dashboard.coupons._edit')
                                        {{--end modal--}}
                                        <div class="mx-5">
                                            @include('includes.msg.tostar-success')
                                            @include('includes.msg.tostar-error')
                                        </div>
                                        <table id="data_table_yajra"
                                               class="display responsive nowrap table table-striped table-bordered dom-jQuery-events">
                                            <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>code</th>
                                                <th>Discount</th>
                                                <th>limitation</th>
                                                <th>Time Used</th>
                                                <th>is Active</th>
                                                <th>start Date</th>
                                                <th>end Date</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{----}}
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>code</th>
                                                <th>Discount</th>
                                                <th>limitation</th>
                                                <th>Time Used</th>
                                                <th>is Active</th>
                                                <th>start Date</th>
                                                <th>end Date</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- DOM - jQuery events table -->

            </div>
            <!-- Border color end -->
        </div>
    </div>

@endsection


@push('js')


    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset("assets")}}/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"
            type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/forms/validation/jqBootstrapValidation.js"
            type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/forms/toggle/bootstrap-switch.min.js"
            type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{asset("assets")}}/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{asset("assets")}}/js/core/app.js" type="text/javascript"></script>
    <script src="{{asset("assets")}}/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset("assets")}}/js/scripts/forms/validation/form-validation.js"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->


    <!-- input-file plugin -->
    <script src="{{asset('assets/plugin/file-input/js/fileinput.min.js')}}"></script>
    <script src="{{asset('assets/plugin/file-input/themes/fa5/theme.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script>

    @if(config('app.locale') == 'ar')
        <script src="{{ asset('assets/plugin/file-input/js/locales/LANG.js') }}"></script>
        <script src="{{ asset('assets/plugin/file-input/js/locales/ar.js') }}"></script>

    @endif
    <!-- end input-file plugin -->



    <script>

        var lang = " {{app()->getLocale()}} ";

        $(function () {

            var lang = "{{app()->getLocale()}}";
            var table = $('#data_table_yajra').DataTable({
                processing: true,
                serverSide: true,
                ajax: " {{ route('dashboard.coupons.getAll') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',

                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'discount_percentage',
                        name: 'discount_percentage'
                    },
                    {
                        data: 'limit',
                        name: 'limit',

                    },
                    {
                        data: 'time_used',
                        name: 'time_used',

                    },
                    {
                        data: 'is_active',
                        name: 'is_active',

                    },
                    {
                        data: 'start_at',
                        name: 'start_at',

                    },
                    {
                        data: 'end_at',
                        name: 'end_at',

                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'actions',

                    },
                ],
                responsive: true,
                layout: {
                    topStart: {
                        buttons: ['colvis', 'copy', 'print', 'excel', 'pdf']
                    }
                },
                language: lang === 'ar' ? {
                    url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json',
                } : {},
            });

        });

        var title = "{{__('dashboard.Are you sure?')}}";
        var text = "{{__("dashboard.You want be able to revert this!")}}";
        var confirmButtonText = "{{__('dashboard.Yes, delete it!')}}";
        var cancelButtonText = "{{__('dashboard.No, cancel!')}}";

        $(document).on('click', '.delete_coupon', function (e) {

            e.preventDefault();

           var coupon_id = $(this).attr('coupon_id');
           var url = "{{route('dashboard.coupons.destroy',':id')}}".replace(':id',coupon_id);

            Swal.fire({
                title: title,
                text: text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: confirmButtonText,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url :url,
                        type:'DELETE',
                        data:{
                            _token: "{{csrf_token()}}"
                        },
                        success:function (response){
                            if(response.status === 'success'){
                                Swal.fire({
                                    title: response.status,
                                    text: response.msg,
                                    icon: "success"
                                });

                                $('#data_table_yajra').DataTable().ajax.reload();
                            }
                        }
                    })

                }
            });

        });

        $(document).on('submit','#coupon_create' , function (e){
            e.preventDefault();

            var currentPage = $('#data_table_yajra').DataTable().page();

            var formData = new FormData(this);
            $.ajax({
                url:"{{route('dashboard.coupons.store')}}",
                type:"POST",
                data: formData ,
                processData: false,
                contentType:false,
                success:function (data){
                    if(data.status === 'success'){

                        $('#data_table_yajra').DataTable().page(currentPage).draw(false);
                        $('#add-coupon').modal('hide');
                    }else {
                        alert('sas');
                    }

                },
                error: function(data) {
                    if(data.responseJSON.errors){
                        $.each(data.responseJSON.errors,function (key , value){
                            /*validation after each column*/
                            $('#error_'+key).text(value[0]);
                            /*validation before form*/
                           /* $('#error_ul').append('<li>'+ value[0]+'</li>');
                            $('#error_div').show();*/
                        });
                    }


                }

            })
        })

        /*show data in edit coupon*/
        $(document).on('click', '.edit_coupon', function (e) {
            e.preventDefault();


            $('#coupon_id').val($(this).attr('data-coupon-id'));
            $('#coupon_code').val($(this).attr('data-coupon-code'));
            $('#coupon_discount').val($(this).attr('data-coupon-discount_percentage'));
            $('#coupon_limit').val($(this).attr('data-coupon-limit'));
            $('#coupon_time_used').val($(this).attr('data-coupon-time_used'));
            $('#coupon_start_at').val($(this).attr('data-coupon-start_at'));
            $('#coupon_end_at').val($(this).attr('data-coupon-end_at'));
            $('#coupon_note').val($(this).attr('data-coupon-note'));

            const isActive = $(this).attr('data-coupon-is_active');
            $('#coupon_is-active').prop('checked', Number(isActive) === 1);



            $('#edit_coupon').modal('show');
        });

        /*update coupon*/
        $(document).on('submit','#coupon_edit' , function (e){
            e.preventDefault();

            var currentPage = $('#data_table_yajra').DataTable().page();
            var formData = new FormData(this);
            var coupon_id =  $('#coupon_id').val();
            var url = "{{ route('dashboard.coupons.update', ':id') }}".replace(':id', coupon_id);
            $.ajax({
                url:url,
                type:"POST",
                data: formData ,
                processData: false,
                contentType:false,
                success:function (data){
                    if(data.status === 'success'){

                        $('#data_table_yajra').DataTable().page(currentPage).draw(false);
                        $('.modal_content').modal('hide');
                    }else {
                        alert('sas');
                    }

                },
                error: function(data) {
                    if(data.responseJSON.errors){
                        console.log(data.responseJSON.errors)
                        $.each(data.responseJSON.errors,function (key , value){
                            /*validation after each column*/
                            $('#edit_error_'+key).text(value[0]);
                            /*validation before form*/
                            /* $('#error_ul').append('<li>'+ value[0]+'</li>');
                             $('#error_div').show();*/
                        });
                    }


                }

            })
        })
    </script>
@endpush

