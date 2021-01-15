@extends('frontend.layouts.app')

@section('content')
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Brands</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="wrap-shop-control">

                    <h1 class="shop-title">All Brand</h1>

                </div><!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach($brands as $brand)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('brand.store', $brand->alias)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{asset($brand->logo)}}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('brand.store', $brand->alias)}}" class="shop-name"><span>{{$brand->name}}</span></a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div><!--end main products area-->

        </div><!--end row-->

    </div><!--end container-->
@endsection
