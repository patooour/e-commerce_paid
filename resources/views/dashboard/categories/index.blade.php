@extends('layouts.dashboard.app')

@section('title')
    {{__('dashboard.categories')}}
@endsection

@push('css')

@endpush


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
                                <li class="breadcrumb-item"><a href=" {{route('dashboard.categories.index')}}">{{__('dashboard.categories')}}</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">{{__('dashboard.create_category')}}</a>
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
                                    <h4 class="card-title">{{__('dashboard.categories')}}</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                                        <a class="btn btn-outline-success" href="{{route('dashboard.categories.create')}}">Create Category</a>
                                        <div class="mx-5">
                                            @include('includes.msg.tostar-success')
                                            @include('includes.msg.tostar-error')
                                        </div>
                                        <table id="data_table_yajra" class="table table-striped table-bordered dom-jQuery-events">
                                            <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>status</th>
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
                                                <th>Slug</th>
                                                <th>status</th>
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
    <script>
        $(function () {

            var lang = "{{app()->getLocale()}}";
            var table = $('#data_table_yajra').DataTable({
                processing: true,
                serverSide: true,
                ajax: " {{ route('dashboard.categories.getAll') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        searchable: false,
                        orderable:false
                    },
                    {
                        data: 'name',
                        name:'name'
                    },
                    {
                        data: 'slug',
                        name:'slug'
                    },
                    {
                        data: 'status',
                        name: 'status',

                    },
                    {
                        data: 'created_at',
                        name:'created_at'
                    },
                    {
                        data: 'actions',
                        searchable: false,
                        orderable:false
                    },
                ],
                responsive: true,
                layout: {
                    topStart: {
                        buttons: ['colvis','copy','print','excel','pdf']
                    }
                },
                language: lang === 'ar' ?{
                    url: '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json',
                }: {},
            });

        });

        var title = "{{__('dashboard.Are you sure?')}}";
        var text = "{{__("dashboard.You want be able to revert this!")}}";
        var confirmButtonText = "{{__('dashboard.Yes, delete it!')}}";
        var cancelButtonText = "{{__('dashboard.No, cancel!')}}";

        $(document).on('click' , '.delete_cat' , function (e){

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
            var url = " {{ route('dashboard.categories.status', ':id') }} ";
            url = url.replace(':id', id);

            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                    if (response.status == 'success') {

                        $('.tostar-success').text(response.msg).show();

                        if (response.data.status === 1) {
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
    </script>
@endpush

