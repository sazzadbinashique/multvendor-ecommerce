@extends('frontend.layouts.app')

@section('content')

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Thank You</span></li>
            </ul>
        </div>
    </div>

    <div class="container pb-60">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Thank you for your order</h2>
                {{--<p>A confirmation email was sent.</p>--}}
                <a href="{{url('/')}}" class="btn btn-submit btn-submitx">Continue Shopping</a>
            </div>
        </div>
    </div><!--end container-->
@endsection
