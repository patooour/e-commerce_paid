@extends('layouts.dashboard.app')

@section('title')
    Admins
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
                                <li class="breadcrumb-item active"><a href="#">Create Role</a>
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
                                      {{--live search --}}
                                      <div class="col-md-6 mt-2">
                                          <input id="search_value" class="form-control" type="text" name="search" placeholder="Search for ...">
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

                                    </div>
                                    <div class="table-responsive text-center">
                                    <div class="ajax_table">
                                        <table class="table mb-0">
                                            <thead>
                                            <tr class="border-bottom-active border-custom-color">
                                                <th>#</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>role</th>
                                                <th>status</th>
                                                <th>created At</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($admins as $key=>$admin)
                                                <tr class="border-bottom-success border-custom-color">
                                                    <td>{{$key +1 }}</td>
                                                    <td>{{$admin->name }}</td>
                                                    <td>{{$admin->email }}</td>
                                                    <td>{{$admin->role->role }}</td>
                                                    <td class="@if($admin->status == 'Active') text-success text-bold-700 @else text-danger text-bold-700 @endif">{{$admin->status}}</td>
                                                    <td>{{$admin->created_at->format('Y - m - d') }}</td>

                                                    <td>
                                                        <a class="btn btn-sm btn-primary"
                                                           href="{{route('dashboard.admins.edit',$admin->id)}}"
                                                           title="Admin Edit"><i class="la la-edit"></i>
                                                        </a>

                                                        <a class="btn btn-sm btn-warning"
                                                           href="{{route('dashboard.admins.status',$admin->id)}}"
                                                           title="{{$admin->name}} Change status">
                                                            <i class="la @if($admin->status == 'Active') la-toggle-on @else la-toggle-off @endif"></i>
                                                        </a>

                                                        <a href="javascript:void(0)" onclick="if(confirm('do you want to delete Admin')) {
                                                            document.getElementById('destroy_admin_{{$admin->id}}').submit() } return false"
                                                           class=" btn btn-sm btn-danger" title="delete {{$admin->name}}"><i class="la la-trash"></i>
                                                        </a>

                                                    </td>
                                                    {{-- form for destroy --}}
                                                    <form action="{{route('dashboard.admins.destroy',$admin->id)}}"
                                                          id="destroy_admin_{{$admin->id}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    {{-- end form for destroy --}}
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        {{$admins -> links()}}
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
    <script>
        $(document).on('input' , '#search_value' ,function (e){
           e.preventDefault();

           var search_live = $(this).val();


           $.ajax({
               type:"post",
               url: "{{route('dashboard.admins.search')}}",
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
