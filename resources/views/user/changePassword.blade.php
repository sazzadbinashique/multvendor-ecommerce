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
                {{--@if($errors->count() > 0)
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif--}}
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" action="{{ route('user.updatePassword') }}"  method="POST" >
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Change Password</h3>
                                </fieldset>
                                <fieldset class="wrap-input ">
                                    <label for="password">Password *</label>
                                    <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input ">
                                    <label for="password_confirmation">Confirm Password *</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
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
