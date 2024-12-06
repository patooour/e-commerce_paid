@extends('layouts.dashboard.app')

@section('title')
    Governorates
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
{{--
                    <h3 class="content-header-title mb-0 d-inline-block">Create Role</h3>
--}}
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href=" {{route('dashboard.world.countries')}}">Countries</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Governorates</a>
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
                <!-- Border color end-->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">

                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">{{__('dashboard.Governorates')}}</h4>

                                    <div class="row">
                                     {{--   start modal
                                        <div class="col-md-6">
                                            <a href="{{route('dashboard.admins.create')}}" class="btn btn-primary mt-2 "
                                            >{{__('Governorates.create')}}</a>
                                        </div>
                                        live search --}}
                                        <div class="col-md-6 mt-2">
                                            <input id="search_value" class="form-control" type="text" name="search"
                                                   placeholder="Search for ...">
                                        </div>
                                        {{--live search --}}
                                    </div>

                                    {{--end modal--}}
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
                                <div class="card-content">
                                    <div class="card-body card-dashboard">
                                        <div class="mx-5">
                                            @include('includes.msg.tostar-success')
                                            @include('includes.msg.tostar-error')
                                        </div>
                                    </div>
                                    <div class="table-responsive text-center">
                                        <div class="ajax_table">

                                            <table class="table mb-0">
                                                <thead>
                                                <tr class="border-bottom-active border-custom-color">
                                                    <th>#</th>
                                                     <th>{{__('dashboard.name_governorate')}}</th>
                                                    <th>{{__('dashboard.name_country')}}</th>
                                                    <th>{{__('dashboard.num_of_city')}}</th>
                                                    <th>{{__('dashboard.num_of_user')}}</th>
                                                    <th>{{__('dashboard.status')}}</th>
                                                    <th>{{__('dashboard.manage_status')}}</th>
                                                    <th>{{__('dashboard.shipping_price')}}</th>
                                                    <th>{{__('dashboard.change_price')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($governorates as $key=>$governorate)
                                                    <tr class="border-bottom-success border-custom-color">
                                                        <td>{{$key +1 }}</td>
                                                        <td>
                                                            <a href="" class="text-muted" >
                                                                {{$governorate->name}}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            {{$governorate->country->name .' '}}<i class="flag-icon flag-icon-{{$governorate->country->flag_code}}"></i>

                                                        </td>
                                                        <td class="text-center">
                                                            <div class="badge badge-pill badge-border border-warning warning ">{{$governorate->cities->count() }}</div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div
                                                                class="badge badge-pill badge-border border-warning warning ">0</div>
                                                        </td>
                                                        <td>
                                                            <div id="status_{{$governorate->id}}" class="badge badge-pill badge-border @if($governorate->is_active == 1) border-success success
                                                            @else border-danger danger  @endif">{{$governorate->is_active == 1 ? __('dashboard.active')  : __('dashboard.inactive') }}</div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input
                                                                @checked($governorate->is_active ==  1 ) governorate_id="{{$governorate->id}}"
                                                                type="checkbox" class="switch change_status"
                                                                id="switch5" data-group-cls="btn-group-sm"/>
                                                        </td>
                                                        <td class="text-center" id="price_{{$governorate->id}}">
                                                            {{$governorate->shippingPrice->price}}
                                                        </td>
                                                        <td class="text-center">
                                                            <button  data-toggle="modal" data-target="#iconModal_{{$governorate->id}}"
                                                                     class="btn btn-sm btn-primary">{{__('dashboard.change_price')}}</button>

                                                        </td>

                                                    </tr>
                                                    {{--start modal--}}
                                                        @include('dashboard.world.includes.charge')
                                                    {{--end modal--}}
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$governorates->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
            <!-- Border color end -->
        </div>
    </div>

@endsection

@push('js')
    {{--switch and select --}}
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset("assets")}}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/forms/toggle/bootstrap-checkbox.min.js"
            type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>

    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset("assets")}}/js/scripts/tables/components/table-components.js"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    {{--switch and select --}}

    <script>
        $(document).on('change', '.change_status', function (e) {
            e.preventDefault();

            var id = $(this).attr('governorate_id');
            var url = " {{ route('dashboard.world.governorates.status', ':id') }} ";
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    if (response.status == 'success') {

                        $('.tostar_success').text(response.msg).show();

                        if (response.data.is_active === 1) {
                            $('#status_' + response.data.id)
                                .empty()
                                .text('{{__('dashboard.active')}}')
                                .removeClass('border-danger danger')
                                .addClass('border-success success');
                        } else if (response.data.is_active === 0) {
                            $('#status_' + response.data.id)
                                .empty()
                                .text('{{__('dashboard.inactive')}}')
                                .removeClass('border-success success')
                                .addClass('border-danger danger');
                        }
                    }else{
                        $('.tostar-error').text(response.msg).show();
                    }
                    setTimeout(function (){
                        $('.tostar_success').hide();
                    },3000);

                },
            })
        })

        $(document).on('input' , '#search_value' ,function (e){
            e.preventDefault();

            var search_live = $(this).val();

            $.ajax({
                type:"post",
                url: "{{route('dashboard.world.governorates.search')}}",
                data:{
                    '_token': "{{csrf_token()}}",
                    'search_live': search_live
                },
                beforeSend: function () {
                // عرض مؤشر تحميل
                $('.ajax_table').html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
            },
                success:function (data){

                    $('.ajax_table').html(data)
                },
            })
        })

        /*update shipping price */
        $(document).on('submit' , '.update_shipping_price',function (e){
            e.preventDefault();

            var form = $(this).closest('.update_shipping_price'); // استهداف النموذج
            var id = form.attr('gov_id');
            var data = new FormData(form[0]);

            $.ajax({
                type:"post",
                url: "{{route('dashboard.world.governorates.shipping.change')}}",
                data:data,
                processData:false,
                contentType:false,
                success:function (data){
                    console.log(data)
                    if (data.status == 'success') {

                        $('.tostar_success').text(data.msg).show();

                        $('#price_' + data.data.id)
                                .empty()
                                .text(parseFloat(data.data.price).toFixed(2));
                    }else{
                        $('.tostar-error').text(data.msg).show();
                    }
                    setTimeout(function (){
                        $('.tostar_success').hide();
                    },3000);

                },
                error: function(data) {
                    var response = $.parseJSON(data.responseText);
                    $('#errors_'+id).text(response.errors.price).show();
                },
            })
        })
        /* end update shipping price */
    </script>
@endpush


