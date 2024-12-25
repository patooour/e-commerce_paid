@extends('layouts.dashboard.app')

@section('title')
    Edit {{$brand->name}}
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
                    <h3 class="content-header-title mb-0 d-inline-block">Edit {{$brand->name}} Brand</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href=" {{route('dashboard.brands.index')}}">Brands</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Edit {{$brand->name}} Brand</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

                {{--button Actions --}}
                @include('includes.buttons.actions_header')
                {{--button Actions --}}

            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Edit {{$brand->name}} Brand</h4>
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
                                        @include('includes.errors.validation_error')

                                        <form class="form" method="post" enctype="multipart/form-data"
                                              action="{{route('dashboard.brands.update',$brand->id)}}">
                                            @csrf
                                            @method('put')
                                            <div class="form-body">
                                                <input type="hidden" value="{{$brand->id}}" name="id">
                                                <h4 class="form-section"><i class="ft-user"></i>
                                                    Brand {{$brand->name}} Info</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Brand Name in English</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Enter Brand name in English"
                                                                   value="{{$brand->getTranslation('name', 'en')}}"
                                                                   name="name[en]">
                                                            @error('name.en')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Brand Name in Arabic</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="Enter Brand name in Arabic"
                                                                   value="{{$brand->getTranslation('name', 'ar')}}"
                                                                   name="name[ar]">
                                                            @error('name.ar')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Logo</label>
                                                            <input type="file" class="form-control" id="single_logo_edit"
                                                                   name="logo">
                                                            @error('logo')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5>
                                                                <strong>Status </strong>
                                                            </h5>
                                                            <div class="controls">
                                                                <input type="checkbox" @checked($brand->status == 1)
                                                                name="status" class="switchery" >
                                                                <span class="ml-1">Active</span>
                                                            </div>
                                                        </div>

                                                    </div>                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <a href="{{url()->previous()}}" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </a>
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

        $(function (){
            $("#single_logo_edit").fileinput({

                theme: 'fa5',
                maxFileCount: 1,
                language:lang,
                showUpload: false,
                initialPreviewAsData: true,
                initialPreview:"{{asset($brand->logo)}}",


            });


        });

    </script>
@endpush
