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
           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
               <div class=" main-content-area">
                   <div class="wrap-login-item ">
                       <div class="register-form form-item ">
                           <form class="form-stl" action="{{ route('register') }}" name="frm-login" method="POST" >
                               @csrf
                               <fieldset class="wrap-title">
                                   <h3 class="form-title">Create an account</h3>
                               </fieldset>
                               <fieldset class="wrap-input">
                                   <label for="frm-reg-lname">Name*</label>
                                   <input type="text" id="name" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror" placeholder="Last name*">
                                   @error('name')
                                   <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </fieldset>
                               <fieldset class="wrap-input">
                                   <label for="frm-reg-email">Email Address*</label>
                                   <input type="email" id="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="Email address">
                                   @error('email')
                                   <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                   @enderror
                               </fieldset>
                               <fieldset class="wrap-input ">
                                   <label for="password">Password *</label>
                                   <input type="password" id="password" name="password"  value="{{ old('password') }}" class="@error('password') is-invalid @enderror" placeholder="Password">
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
                               <input type="submit" class="btn btn-sign" value="Register" name="register">
                           </form>
                       </div>
                   </div>
               </div><!--end main products area-->
           </div>
       </div><!--end row-->

   </div>
@endsection
