@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Reset Password</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" action="{{ route('password.update') }}" name="frm-login" method="POST" >
                                @csrf
                                <input type="hidden" name="token" value="{{ request()->token }}">

                                <fieldset class="wrap-title">
                                    <h3 class="form-title">{{ __('Reset Password') }}</h3>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-email">Email Address*</label>
                                    <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item ">
                                    <label for="password">Password *</label>
                                    <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half ">
                                    <label for="password-confirm">Confirm Password *</label>
                                    <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Password">
                                </fieldset>
                                <input type="submit" class="btn btn-sign" value=" {{ __('Reset Password') }}" name="register">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
