@extends('layouts.dashboard.app')

@section('title')
    Create Admin
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Create Admin</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href=" {{route('dashboard.admins.index')}}">admins</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Create Admin</a>
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
                                    <h4 class="card-title" id="basic-layout-form">Create Admin</h4>
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
                                        <form class="form" method="post" action="{{route('dashboard.admins.store')}}">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Admin Info</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Admin Name</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="Enter Admin name "
                                                                   value="{{old('name')}}"
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
                                                                   value="{{old('email')}}"
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
                                                                    <option value="{{$role->id}}"> {{$role->role}}
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
                                                                <option  value="1" class="text-success text-bold-500"> Active </option>
                                                                <option  value="0" class="text-danger text-bold-500"> Deactivate </option>

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
