@extends('layouts.dashboard.app')

@section('title')
    Edit {{$category->name}}
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Edit {{$category->name}} Category</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a
                                        href=" {{route('dashboard.categories.index')}}">Categorys</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="#">Edit {{$category->name}} Category</a>
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
                                    <h4 class="card-title" id="basic-layout-form">Edit {{$category->name}} Category</h4>
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
                                              action="{{route('dashboard.categories.update',$category->id)}}">
                                            @csrf
                                            @method('put')
                                            <div class="form-body">
                                                <input type="hidden" value="{{$category->id}}" name="id">
                                                <h4 class="form-section"><i class="ft-user"></i>
                                                    Category {{$category->name}} Info</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Category Name in English</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Enter Category name in English"
                                                                   value="{{$category->getTranslation('name', 'en')}}"
                                                                   name="name[en]">
                                                            @error('name[en]')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">Category Name in Arabic</label>
                                                            <input type="text" id="projectinput1" class="form-control"
                                                                   placeholder="Enter Category name in Arabic"
                                                                   value="{{$category->getTranslation('name', 'ar')}}"
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
                                                            <label for="projectinput1">Category Parent</label>
                                                            <select type="text" class="form-control"
                                                                    name="parent">
                                                                @foreach($categories as $cat)
                                                                    <option value="{{$cat->id}}"
                                                                        @selected($category -> parent == $cat->id)> {{$cat->name}}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('category')
                                                            <strong class="text-danger">{{$message}}</strong>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Category Status</label>
                                                            <select class="form-control" name="status">
                                                                <option class="text-success"
                                                                    @selected($category->status == 1) value="1">
                                                                    Active
                                                                </option>
                                                                <option class="text-danger"
                                                                    @selected($category->status == 0) value="0">
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
