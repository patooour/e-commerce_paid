@extends('layouts.dashboard.app')

@section('title')
   Edit {{$admin->name}}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Edit {{$admin->name}} Role</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href=" {{route('dashboard.roles.index')}}">Roles</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Edit {{$admin->name}} Role</a>
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
                                    <h4 class="card-title" id="basic-layout-form">Edit {{$admin->name}} Role</h4>
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
                                        <form class="form" method="post" action="{{route('dashboard.admins.update',$admin->id)}}">
                                            @csrf
                                            @method('put')
                                            <div class="form-body">
                                                <input type="hidden" value="{{$admin->id}}" name="id">
                                                <h4 class="form-section"><i class="ft-user"></i> Admin {{$admin->name}} Info</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Admin Name</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="Enter Admin name "
                                                                   value="{{$admin->name}}"
                                                                   name="name">
                                                            @error('role')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Admin Email</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="Enter Admin Email "
                                                                   value="{{$admin->email}}"
                                                                   name="email">
                                                            @error('email')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Admin Role</label>
                                                            <select type="text" id="projectinput1" class="form-control"
                                                                  name="role_id">
                                                                @foreach($roles as $role)
                                                                <option value="{{$role->id}}"
                                                                    @selected($role -> id == $admin->role->id)> {{$admin->role->role}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            @error('role')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Admin Status</label>
                                                            <select id="projectinput1" class="form-control" name="status">
                                                                    <option @selected($admin->status == 'Active') value="1"> Active </option>
                                                                    <option @selected($admin->status == 'Inactive') value="0"> Deactivate </option>

                                                            </select>
                                                            @error('status')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    @error('permissions')
                                                    <strong class="text-danger">{{$message}}</strong>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Password</label>
                                                            <input type="password" id="projectinput1" class="form-control"
                                                                   placeholder="Enter password"
                                                                   name="password">
                                                            @error('password')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Password Confirmation</label>
                                                            <input type="password" id="projectinput1" class="form-control"
                                                                   placeholder="Enter Password confirmation "
                                                                   name="password_confirmation">
                                                            @error('password_confirmation')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>

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
