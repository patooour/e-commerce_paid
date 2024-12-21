@extends('layouts.dashboard.app')

@section('title')
    Countries
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Create Role</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href=" {{route('dashboard.admins.index')}}">Admins</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Countries</a>
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
                                    <h4 class="card-title">{{__('roles.permissions')}}</h4>

                                    <div class="row">
                                        {{--start modal--}}
                                        <div class="col-md-6">
                                            <a href="{{route('dashboard.admins.create')}}" class="btn btn-primary mt-2 "
                                            >{{__('admins.create')}}</a>
                                        </div>

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

                                            <table class="table mb-0" id="data_table_yajra">
                                                <thead>
                                                <tr class="border-bottom-active border-custom-color">
                                                    <th>#</th>
                                                    <th>{{__('dashboard.name_country')}}</th>
                                                    <th>{{__('dashboard.phone_code')}}</th>
                                                    <th>{{__('dashboard.num_of_governorate')}}</th>
                                                    <th>{{__('dashboard.num_of_user')}}</th>
                                                    <th>{{__('dashboard.status')}}</th>
                                                    <th>{{__('dashboard.manage_status')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($countries as $key=>$country)
                                                    <tr class="border-bottom-success border-custom-color">
                                                        <td>{{$key +1 }}</td>
                                                        <td>
                                                            <a href="{{route('dashboard.world.governorates',$country->id)}}" class="text-muted" >
                                                                {{$country->name .' '}}<i class="flag-icon flag-icon-{{$country->flag_code}}"></i>
                                                            </a>
                                                        </td>
                                                        <td class="text-bold-600">{{$country->phone_code }} </td>
                                                        <td class="text-center">
                                                            <div
                                                                class="badge badge-pill badge-border border-warning warning ">{{$country->governorates_count }}</div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div
                                                                class="badge badge-pill badge-border border-primary primary">{{$country->users_count }}</div>
                                                        </td>
                                                        <td>
                                                            <div id="status_{{$country->id}}" class="badge badge-pill badge-border @if($country->is_active == 1) border-success success
                                                            @else border-danger danger  @endif">{{$country->is_active == 1 ? __('dashboard.active')  : __('dashboard.inactive') }}</div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input
                                                                @checked($country->is_active ==  1 ) country_id="{{$country->id}}"
                                                                type="checkbox" class="switch change_status"
                                                                id="switch5" data-group-cls="btn-group-sm"/>
                                                        </td>


{{-- form for destroy
                                                       <form action="{{route('dashboard.admins.destroy',$country->id)}}"
                                                              id="destroy_admin_{{$country->id}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        --}}
 {{--end form for destroy --}}


                                                    </tr>

                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{__('dashboard.name_country')}}</th>
                                                    <th>{{__('dashboard.phone_code')}}</th>
                                                    <th>{{__('dashboard.num_of_governorate')}}</th>
                                                    <th>{{__('dashboard.num_of_user')}}</th>
                                                    <th>{{__('dashboard.status')}}</th>
                                                    <th>{{__('dashboard.manage_status')}}</th>
                                                </tr>
                                                </tfoot>
                                            </table>
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
    {{--switch and select--}}
    <!-- BEGIN PAGE VENDOR JS -->
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

            var id = $(this).attr('country_id');
            var url = " {{ route('dashboard.world.countries.status', ':id') }} ";
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {

                    if (response.status == 'success') {

                        $('.tostar-success').text(response.msg).show();

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
                        $('.tostar-success').hide();
                    },3000);

                },
            })
        })

        $(document).on('input' , '#search_value' ,function (e){
            e.preventDefault();

            var search_live = $(this).val();

            $.ajax({
                type:"post",
                url: "{{route('dashboard.world.countries.search')}}",
                data:{
                    '_token': "{{csrf_token()}}",
                    'search_live': search_live
                },
                success:function (data){

                    $('.ajax_table').html(data)
                },
            })
        })


    </script>

@endpush
