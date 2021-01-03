@extends('frontend.layouts.app')

@section('content')
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Email</a></li>
                <li class="item-link"><span>Verify</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item form-stl ">
                            <fieldset class="wrap-title">
                                <h3 class="form-title text-center">{{ __('Verify Your Email Address') }}</h3>
                            </fieldset>
                            <fieldset class="wrap-input">
                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                            </fieldset>
                            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-sign">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div><!--end main products area-->
            </div>
        </div><!--end row-->
    </div>
@endsection
