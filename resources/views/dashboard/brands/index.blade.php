@extends('layouts.dashboard.app')

@section('title')
    {{__('dashboard.brands')}}
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
                    <h3 class="content-header-title mb-0 d-inline-block">Create Brand</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href=" {{route('dashboard.brands.index')}}">{{__('dashboard.brands')}}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{__('dashboard.create_brand')}}</a>
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
                                    <h4 class="card-title">{{__('dashboard.brands')}}</h4>
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="" class="btn btn-outline-success mt-2 " data-toggle="modal"
                                                   data-target="#addBrand">{{__('brand.add')}}</a>
                                            </div>
                                        </div>

                                        <div class="modal addBrand fade text-left" id="addBrand" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="myModalLabel2"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel2"><i
                                                                class="la la-road2"></i> {{__('brand.add')}}</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>

                                                    </div>
                                                    <form class="form" action="{{route('dashboard.brands.store')}}"
                                                          method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1">name in
                                                                            English</label>
                                                                        <input type="text" id="projectinput1"
                                                                               class="form-control"
                                                                               placeholder="Enter name in English"
                                                                               name="name[en]">
                                                                        @error('name.en')
                                                                        <strong
                                                                            class="text-danger">{{$message}}</strong>
                                                                        @enderror
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1">name in
                                                                            Arabic</label>
                                                                        <input type="text" id="projectinput1"
                                                                               class="form-control"
                                                                               placeholder="Enter name in Arabic"
                                                                               name="name[ar]">
                                                                        @error('name.ar')
                                                                        <strong
                                                                            class="text-danger">{{$message}}</strong>
                                                                        @enderror
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="row mt-1">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="projectinput1">Logo of Brand</label>
                                                                        <input type="file" id="single_file"
                                                                               class="form-control"
                                                                               name="logo">
                                                                        @error('logo')
                                                                        <strong
                                                                            class="text-danger">{{$message}}</strong>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="row mt-1">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <h5>
                                                                                <strong>Status </strong>
                                                                            </h5>
                                                                            <div class="controls">
                                                                                <input type="checkbox" checked name="status" class="switchery" >
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
                                        <div class="mx-5">
                                            @include('includes.msg.tostar-success')
                                            @include('includes.msg.tostar-error')
                                        </div>
                                        <table id="data_table_yajra"
                                               class="table table-striped table-bordered dom-jQuery-events">
                                            <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Logo</th>
                                                <th>status</th>
                                                <th>Product Count</th>
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
                                                <th>Name</th>
                                                <th>Logo</th>
                                                <th>status</th>
                                                <th>Product Count</th>
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


    @if($errors -> any())
        <script>
            $(document).ready(function (){
                $('#addBrand').modal('show');
            });
        </script>
    @endif
    <script>

        var lang = " {{app()->getLocale()}} ";

        $(function (){
            $("#single_file").fileinput({
                theme: 'fa5',
                maxFileCount: 1,
                language:lang,
                showUpload: false
            });


        });
        $(function () {

            var lang = "{{app()->getLocale()}}";
            var table = $('#data_table_yajra').DataTable({
                processing: true,
                serverSide: true,
                ajax: " {{ route('dashboard.brands.getAll') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',

                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'logo',
                        name: 'logo'
                    },
                    {
                        data: 'status',
                        name: 'status',

                    },
                    {
                        data: 'product_count',
                        name: 'product_count',

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

        $(document).on('click', '.delete_cat', function (e) {

            e.preventDefault();
            form = $(this).closest('form');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: true
            });
            swalWithBootstrapButtons.fire({
                title: title,
                text: text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: confirmButtonText,
                cancelButtonText: cancelButtonText,
                reverseButtons: true

            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                    swalWithBootstrapButtons.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error"
                    });
                }
            });
        });

        $(document).on('click', '.change_status', function (e) {
            e.preventDefault();

            var id = $(this).attr('cat_id');
            var url = " {{ route('dashboard.brands.status', ':id') }} ";
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    if (response.status === 'success') {

                        $('.tostar_success').text(response.msg).show();

                        if (response.data.status === 1) {
                            $('#status_' + response.data.id)
                                .empty()
                                .text('{{__('dashboard.active')}}')
                                .removeClass('text-danger danger')
                                .addClass('text-success success');
                        } else if (response.data.status === 0) {
                            $('#status_' + response.data.id)
                                .empty()
                                .text('{{__('dashboard.inactive')}}')
                                .removeClass('text-success success')
                                .addClass('text-danger danger');
                        }
                    } else {
                        $('.tostar-error').text(response.msg).show();
                    }
                    setTimeout(function () {
                        $('.tostar_success').hide();
                    }, 3000);
                },
            })
        })
    </script>
@endpush

