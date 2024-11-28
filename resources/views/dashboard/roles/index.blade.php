@extends('layouts.dashboard.app')

@section('title')
    Home
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
                                <li class="breadcrumb-item"><a href=" {{route('dashboard.home')}}">Roles</a>
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

                                    {{--start modal--}}
                                    <a href="" class="btn btn-primary mt-2 " data-toggle="modal"
                                       data-target="#iconModal">{{__('roles.add')}}</a>

                                    <div class="modal fade text-left" id="iconModal" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel2"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel2"><i
                                                            class="la la-road2"></i> Basic Modal</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="form" action="{{route('dashboard.roles.store')}}"
                                                      method="post">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Role English</label>
                                                                    <input type="text" id="projectinput1"
                                                                           class="form-control"
                                                                           placeholder="Enter Role in English"
                                                                           name="role[en]">
                                                                    @error('role.en')
                                                                    <strong class="text-danger">{{$message}}</strong>
                                                                    @enderror
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">Role Arabic</label>
                                                                    <input type="text" id="projectinput1"
                                                                           class="form-control"
                                                                           placeholder="Enter Role in Arabic"
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
                                        <table class="table mb-0">
                                            <thead>
                                            <tr class="border-bottom-active border-custom-color">
                                                <th>#</th>
                                                <th>Role</th>
                                                <th>Permissions</th>
                                                <th>Operations</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($roles as $key=>$role)
                                                <tr class="border-bottom-success border-custom-color">
                                                    <td>{{$key +1 }}</td>
                                                    <td>{{$role->role }}</td>
                                                    <td>
                                                        {{--to show arabic roles values--}}
                                                        @if(Config::get('app.locale') == 'ar')
                                                            @foreach($role->permissions as $permission)

                                                                @foreach(config('permissions_ar') as $key=>$value)
                                                                    {{$key == $permission  ? '-'.$value   : '' }}
                                                                @endforeach
                                                            @endforeach

                                                        @else
                                                            @foreach($role->permissions as $permission)
                                                                {{'-' . $permission}}
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary"
                                                           href="{{route('dashboard.roles.edit',$role->id)}}"
                                                           title="Role Edit"><i class="ft-edit"></i></a>
                                                        <a href="javascript:void(0)" onclick="if(confirm('do you want to delete Role')) {
                                                    document.getElementById('destroy_role_{{$role->id}}').submit() } return false
                                                    " class=" btn btn-sm btn-danger"><i class="ft-trash"></i>
                                                        </a>
                                                    </td>
                                                    {{-- form for destroy --}}
                                                    <form action="{{route('dashboard.roles.destroy',$role->id)}}"
                                                          id="destroy_role_{{$role->id}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    {{-- end form for destroy --}}
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{$roles -> links()}}
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
