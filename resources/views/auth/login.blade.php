@extends('layouts.app')

@section('content')
<div class="last-section-bg">
    <div class="container">
        <div class="hide-responsive">
        </div>
        <div class="show-responsive">
            <div class="row">
                <div class="col-lg-6">
                    <div class="head-txt-product">Login</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card proinfo-bg">
              <h1 align="center">Welcome To </h1>
              <img src="{{asset('img/logo/poolicon.png')}}" style="width: 75%; margin-left: auto;margin-right: auto;" align="center">
                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('login') }} "> --}}
                    <form method="POST" action="{{ route('login') }} " id="login-admin-form">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                            {{-- <div class="col-md-6"> --}}
                                <input id="email" placeholder="E-Mail Address" style="width: 100%;" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required="" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            {{-- </div> --}}
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            {{-- <div class="col-md-6"> --}}
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="false" required="">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            {{-- </div> --}}
                        </div>

                        <div class="form-group row">
                            {{-- <div class="col-md-6 offset-md-4"> --}}
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" style="margin-left: 16px;" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            {{-- </div> --}}
                        </div>

                        <div class="form-group row mb-0">
                            {{-- <div class="col-md-8 offset-md-4"> --}}
                                <button type="submit" class="btn btn-primary btn-login" id="signin-accept" style="width: 100%;">
                                    {{ __('Login') }}
                                </button>
                            {{-- </div> --}}
                        </div>
                    </form>
        {{-- <script src="{{ asset('js/login-admin.js') }}"></script> --}}
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>

@endsection
