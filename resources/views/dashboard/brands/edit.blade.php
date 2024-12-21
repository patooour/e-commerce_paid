@extends('layouts.dashboard.app')

@section('title')
   Edit {{$role->role}} Role
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Edit {{$role->role}} Role</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href=" {{route('dashboard.roles.index')}}">Roles</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Edit {{$role->role}} Role</a>
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
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Edit {{$role->role}} Role</h4>
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
                                    <div class="card-body">
                                        {{--
                                                                                @include('includes.errors.validation_error')
                                        --}}
                                        {{--    <div class="card-text">
                                                <p>This is the most basic and default form having form sections.
                                                    To add form section use <code>.form-section</code> class
                                                    with any heading tags. This form has the buttons on the bottom
                                                    left corner which is the default position.</p>
                                            </div>--}}
                                        <form class="form" method="post" action="{{route('dashboard.roles.update',$role->id)}}">
                                            @csrf
                                            @method('put')
                                            <div class="form-body">
                                                <input type="hidden" value="{{$role->id}}" name="id">
                                                <h4 class="form-section"><i class="ft-user"></i> Roles Info</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Role English</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="Enter Role in English"
                                                                   value="{{$role->getTranslation('role','en')}}"
                                                                   name="role[en]">
                                                            @error('role.en')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Role Arabic</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="Enter Role in Arabic"
                                                                   value="{{$role->getTranslation('role','ar')}}"
                                                                   name="role[ar]">
                                                            @error('role.ar')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row mt-1">
                                                    @if(Config::get('app.locale') == 'ar')
                                                        @foreach(config('permissions_ar') as $key => $value)
                                                            <div class="col-md-2">
                                                                <input name="permissions[]" value="{{$key}}"
                                                                       class="state checkbox icheckbox_flat-green mr-1 "
                                                                       @checked(in_array($key , $role->permissions))
                                                                       type="checkbox" id="input-15">
                                                                <label for="">{{$value}}</label>
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                    @if(Config::get('app.locale') == 'en')
                                                        @foreach(config('permissions_en') as $key => $value)
                                                            <div class="col-md-2">
                                                                <input name="permissions[]" value="{{$key}}"
                                                                       class="state checkbox icheckbox_flat-green mr-1 "
                                                                       @checked(in_array($key , $role->permissions))
                                                                       type="checkbox" id="input-15">
                                                                <label for="">{{$value}}</label>
                                                            </div>
                                                        @endforeach
                                                    @endif

                                                    @error('permissions')
                                                    <strong class="text-danger">{{$message}}</strong>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
@endsection


@push('js')
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset("assets")}}/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/forms/toggle/bootstrap-checkbox.min.js"
            type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/forms/select/select2.full.min.js" type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"
            type="text/javascript"></script>
    <script src="{{asset("assets")}}/vendors/js/charts/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{asset("assets")}}/js/scripts/tables/components/table-components.js"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
@endpush
