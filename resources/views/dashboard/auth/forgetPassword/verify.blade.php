@extends('layouts.dashboard.auth.app')

@section('title')
    Login
@endsection



@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <img src="{{asset("assets")}}/images/logo/logo-dark.png" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>enter otp send to mail</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @include('includes.errors.errors')

                                        <form class="form-horizontal" action="{{route('dashboard.verifyOtpEmail')}}"
                                              method="post">
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="hidden" name="email" value="{{$email}}">
                                                <input type="hidden" name="token" value="{{$token}}">

                                                <input type="text" class="form-control form-control-lg input-lg"

                                                       name="otp" placeholder="Your otp sent to mail">
                                                <div class="form-control-position">
                                                    <i class="ft-mail"></i>
                                                </div>
                                                @error('otp')
                                                <div class="text-danger text-bold">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                            </fieldset>
                                            <button type="submit" class="btn btn-outline-info btn-lg btn-block">
                                                <i class="ft-unlock"></i> verify Otp
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer border-0">
                                    <p class="float-sm-left text-center">
                                        <a href="{{route('dashboard.login')}}" class="card-link">Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush