@extends('frontend.layouts.app')

@section('content')
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link text-uppercase"><span>Profile</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-5 col-xs-12">

                <div class="main-content-area">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a class="text-uppercase" href="{{route('user.profile')}}">Profile</a></li>
                        <li><a class="text-uppercase" href="{{route('user.changePassword')}}">Change Passowrd</a></li>
                        <li><a class="text-uppercase" href="">Order Histoy</a></li>
                        <li><a class="text-uppercase" href="">Order tracking</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-7 col-sm-6 col-md-7 col-xs-12">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" action="{{route('user.updateProfile')}}" name="frm-login" method="POST" >
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Profile Information</h3>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Name*</label>
                                    <input type="text" id="avatar" name="avatar" class="@error('avatar') is-invalid @enderror" placeholder="Last name*" value="{{$user->avatar}}">
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Name*</label>
                                    <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror" placeholder="Last name*" value="{{$user->name}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-email">Email Address*</label>
                                    <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Email address" value="{{$user->email}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <input type="submit" class="btn btn-sign" value="Update">
                            </form>
                        </div>
                    </div>
                </div><!--end main products area-->
            </div>
        </div><!--end row-->

    </div><!--end container-->
@endsection
