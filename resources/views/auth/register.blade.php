@extends('layouts.app')

@section('content')
<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100"   id="lim">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('imgs/add1.png')}}" alt="IMG">
                </div> 
                    <form  class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                    <span class="login100-form-title">
                        SIGN UP
                    </span>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required autocomplete="name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="lastname" placeholder="Apellidos" value="{{ old('lastname') }}" required autocomplete="lastname">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="phone" placeholder="Telefono" value="{{ old('phone') }}" required autocomplete="phone">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="text" name="address" placeholder="Dirección" value="{{ old('address') }}" required autocomplete="address">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz" >
                        <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password"  placeholder="Password Confirmation" name="password_confirmation" required autocomplete="new-password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                        <!-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> -->

                        <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
    </div>
</div>
@endsection
