@extends('layouts.dashboard.app')

@section('title')
    {{__('dashboard.create_brand')}}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Create Brand</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">
                                        {{__('dashboard.Home')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href=" {{route('dashboard.Brands.index')}}">
                                        {{__('dashboard.Brand')}}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">
                                        {{__('dashboard.create_Brand')}}</a>
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
                                    <h4 class="card-title" id="basic-layout-form"> {{__('dashboard.create_Brand')}}</h4>
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

                                        <form class="form" method="post"
                                              action="{{route('dashboard.brands.store')}}">
                                            @csrf

                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-user"></i>
                                                    {{__('dashboard.create_Brand')}}
                                                </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Brand Name in English</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Enter Brand name in English"
                                                                   name="name[en]">
                                                            @error('name[en]')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Brand Name in Arabic</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="Enter Brand name in Arabic"
                                                                   name="name[ar]">
                                                            @error('name[ar]')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Brand Parent</label>
                                                            <select type="text" class="form-control"
                                                                    name="parent">
                                                                <option class="text-success"
                                                                        value="">
                                                                    Select Brand Parent
                                                                </option>
                                                                @foreach($Brands as $cat)
                                                                    <option value="{{$cat->id}}"
                                                                       > {{$cat->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('parent')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Brand Status</label>
                                                            <select class="form-control" name="status">
                                                                <option class="text-success"
                                                                        value="">
                                                                    Select Status
                                                                </option>
                                                                <option class="text-success"
                                                                       value="1">
                                                                    Active
                                                                </option>
                                                                <option class="text-danger"
                                                                        value="0">
                                                                    Deactivate
                                                                </option>

                                                            </select>
                                                            @error('status')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
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
