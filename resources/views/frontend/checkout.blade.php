@extends('frontend.layouts.app')

@section('content')
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class="main-content-area">

            <form action="{{route('order.place')}}" method="POST">
                @csrf
                <div class="wrap-address-billing">
                    <h3 class="box-title">Billing Address</h3>
                        <p class="row-in-form">
                            <label for="name">Full Name<span>*</span></label>
                            <input id="name" type="text" name="name"  placeholder="Your name">
                        </p>
                        <p class="row-in-form">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" placeholder="Type your email">
                        </p>
                        <p class="row-in-form">
                            <label for="phone">Phone number<span>*</span></label>
                            <input id="phone" type="number" name="phone" placeholder="10 digits format">
                        </p>
                        <p class="row-in-form">
                            <label for="address">Address:</label>
                            <input id="address" type="text" name="address" placeholder="Street at apartment number">
                        </p>
                        <p class="row-in-form">
                            <label for="country">Country<span>*</span></label>
                            <input id="country" type="text" name="country" value="" placeholder="United States">
                        </p>
                        <p class="row-in-form">
                            <label for="zip_code">Postcode / ZIP:</label>
                            <input id="zip_code" type="number" name="zip_code" placeholder="Your postal code">
                        </p>

                        <p class="row-in-form">
                            <label for="password">Password *</label>
                            <input type="password" id="password" name="password"  value="{{ old('password') }}" class="@error('password') is-invalid @enderror" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                            @enderror
                        </p>
                        <p class="row-in-form">
                            <label for="password_confirmation">Confirm Password *</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        </p>
                        <p class="row-in-form">
                            <label for="city">Town / City<span>*</span></label>
                            <input id="city" type="text" name="city" placeholder="City name">
                        </p>
                        <p class="row-in-form fill-wife">
                            <label class="checkbox-field">
                                <input name="create_account" id="create_account" value="forever" type="checkbox">
                                <span>Create an account?</span>
                            </label>
                        </p>
                </div>
                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="cash_on_delivery" id="cash_on_delivery" value="cash" type="checkbox">
                                <span>Cash On Delivery</span>
                            </label>

                        </div>
                        {{--<div class="choose-payment-methods">
                            <div class="shipping-method">
                                <h4 class="title-box f-title">Shipping Cost</h4>
                                <p class="summary-info"><span class="title">Fixed &#2547; 50.00</span></p>
                            </div>
                        </div>--}}
                        <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{ Cart::total() }}</span></p>
                        <button type="submit" class="btn btn-medium">Place order now</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
