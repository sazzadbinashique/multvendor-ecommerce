@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="{{url('/')}}" class="link">home</a></li>
                <li class="item-link"><span>Forgot Password</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="login-form form-item form-stl">
                            <form name="frm-login" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title" >{{ __('Reset Password') }}</h3>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Email Address:</label>
                                    <input type="text" id="frm-login-uname" class="@error('email') is-invalid @enderror" name="email" placeholder="Type your email address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="alert-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="{{ __('Send Password Reset Link') }}" name="submit">
                            </form>
                        </div>
                    </div>
                </div><!--end main products area-->
            </div>
        </div><!--end row-->
    </div>
@endsection
