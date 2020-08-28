@extends('layouts.app')

@section('content')

<div class="limiter">
        <div class="container-login100" >
            <div class="wrap-login100"  id="lim">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('imgs/img3.png')}}" alt="IMG">
                </div>
                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    <span class="login100-form-title">
                         LOGIN
                    </span>    
                    {{ csrf_field() }}

                   

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                  
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                           


                        <div class="container-login100-form-btn">
                            
                                <button type="submit" class="login100-form-btn">
                                    {{ __('Login') }}
                                </button>

                                <div class="text-center p-t-136">
                                @if (Route::has('password.request'))
                                    <a class="text2" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
              
        </div>
    </div>
</div>
@endsection


