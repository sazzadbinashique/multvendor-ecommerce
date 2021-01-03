@extends('frontend.layouts.app')

@section('content')
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Register</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12 col-md-offset-2">
                {{--@if($errors->count() > 0)
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item btn-danger text-black">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif--}}
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" action="{{ route('seller.new.register') }}" name="frm-login" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Become a Seller</h3>
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item">
                                    <label for="frm-reg-lname">Name*</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror" placeholder="Full Name...">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half">
                                    <label for="email">Email Address*</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="Email address...">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item">
                                    <label for="shop_name">Shop Name*</label>
                                    <input type="text" id="shop_name" name="shop_name" value="{{ old('shop_name') }}" class="@error('shop_name') is-invalid @enderror" placeholder="Shop name...">
                                    @error('shop_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half">
                                    <label for="licence">Licence*</label>
                                    <input type="text" id="licence" name="licence" value="{{ old('licence') }}" class="@error('licence') is-invalid @enderror" placeholder="Licence @exeample: 1234">
                                    @error('licence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item">
                                    <label for="phone">Number*</label>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror" placeholder="Phone ..">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half">
                                    <label for="address">Address*</label>
                                    <input type="text" id="address" name="address" value="{{ old('address') }}" class="@error('address') is-invalid @enderror" placeholder="Address ...">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Logo *</label>
                                    <input type="file" id="logo" name="logo" value="{{ old('logo') }}" class="@error('name') is-invalid @enderror" placeholder=" Shop logo image ...">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input ">
                                    <label for="password">Password *</label>
                                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="@error('password') is-invalid @enderror" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="password_confirmation">Confirm Password *</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"placeholder="Confirm Password">
                                </fieldset>
                                <div>
                                    <input type="submit" class="btn btn-sign" value="Become A Seller">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
