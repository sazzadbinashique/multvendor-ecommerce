@extends('frontend.layouts.app')

@section('content')

    <div class="container">
        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                @foreach($sliders as $k => $slider)
                <div class="item-slide">
                    <img src="{{asset($slider->image)}}" alt="" class="img-slide">
                    <div class="slide-info {{ ($slider->position === ($slider->position)) ? $slider->position : '' }}">
                        <h2 class="f-title">{{$slider->product_title}}</h2>
                        <span class=" {{ (($slider->position == 'slide-2' )|| ($slider->position == 'slide-3') ) ? 'f-subtitle' : 'subtitle'}}">{{$slider->subtitle}}</span>
                        <p class="sale-info">Only price: <b class="price">{{$slider->price}}</b></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            @foreach($banners as $banner)
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset($banner->image)}}" alt="" width="580" height="190"></figure>
                </a>
            </div>
            @endforeach
        </div>

        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">Best Sale</h3>
            {{--<div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>--}}
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                @foreach($products as $product)
                <div class="product product-style-2 equal-elem ">
                    <div class="product-thumnail">
                        <a href="{{route('single.product', $product->alias)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                            <figure><img src="assets/images/products/tools_equipment_7.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                        </a>
                        <div class="group-flash">
                            <span class="flash-item sale-label">sale</span>
                        </div>
                        <div class="wrap-btn">
                            <a href="{{route('cart.rapid.add', $product->alias)}}" class="function-link">Add To Cart</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <a href="{{route('single.product', $product->alias)}}" class="product-name"><span>{{$product->name}}</span></a>
                        <div class="wrap-price"><span class="product-price">$ {{$product->price}}</span></div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Latest Products</h3>
            <div class="wrap-top-banner">
                @foreach($bannerLongs as $item => $bannerLong)
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{($item === 0 )? asset($bannerLong->image): ''}}" width="1170" height="240" alt=""></figure>
                </a>
                @endforeach
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                @foreach($latestProducts as $latestProduct)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('single.product', $latestProduct->alias)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{asset('assets/images/products/digital_04.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('cart.rapid.add', $latestProduct->alias)}}" class="function-link">Add To Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('single.product', $latestProduct->alias)}}" class="product-name"><span>{{$latestProduct->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">$ {{$latestProduct->price}}</span></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Product Categories</h3>
            <div class="wrap-top-banner">
                @foreach($bannerLongs as  $item => $bannerLong)
                    <a href="#" class="link-banner banner-effect-2">
                        <figure><img src="{{($item === 1 )? asset($bannerLong->image): ''}}" width="1170" height="240" alt=""></figure>
                    </a>
                @endforeach

            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        <a href="#fashion_1a" class="tab-control-item active">Smartphone</a>
                        <a href="#fashion_1b" class="tab-control-item">Watch</a>
                        <a href="#fashion_1c" class="tab-control-item">Laptop</a>
                        <a href="#fashion_1d" class="tab-control-item">Tablet</a>
                    </div>
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="fashion_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                @foreach( $categoryProducts as $categoryProduct)
                                    @if($categoryProduct->category_id == 1)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('single.product', $categoryProduct->alias)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{asset('assets/images/products/digital_01.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('cart.rapid.add', $categoryProduct->alias)}}" class="function-link">Add To Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('single.product', $categoryProduct->alias)}}" class="product-name"><span>{{$categoryProduct->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">$ {{ $categoryProduct->price }}</span></div>
                                    </div>
                                </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>


                        <div class="tab-content-item" id="fashion_1b">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach( $categoryProducts as $categoryProduct)
                                    @if($categoryProduct->category_id == 2)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('single.product', $categoryProduct->alias)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{asset('assets/images/products/fashion_01.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item bestseller-label">Bestseller</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('cart.rapid.add', $categoryProduct->alias)}}" class="function-link">Add To Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('single.product', $categoryProduct->alias)}}" class="product-name"><span>{{$categoryProduct->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{$categoryProduct->price}}</span></div>
                                    </div>
                                </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>

                        <div class="tab-content-item" id="fashion_1c">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach( $categoryProducts as $categoryProduct)
                                    @if($categoryProduct->category_id == 3)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('single.product', $categoryProduct->alias)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="assets/images/products/digital_04.jpg" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="group-flash">
                                            <span class="flash-item new-label">new</span>
                                        </div>
                                        <div class="wrap-btn">
                                            <a href="{{route('cart.rapid.add', $categoryProduct->alias)}}" class="function-link">Add To Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('single.product', $categoryProduct->alias)}}" class="product-name"><span>{{$categoryProduct->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{$categoryProduct->price}}</span></div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                            </div>
                        </div>

                        <div class="tab-content-item" id="fashion_1d">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                @foreach( $categoryProducts as $categoryProduct)
                                    @if($categoryProduct->category_id == 4)
                                <div class="product product-style-2 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('single.product', $categoryProduct->alias)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                            <figure><img src="{{asset('assets/images/products/fashion_05.jpg')}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                        </a>
                                        <div class="wrap-btn">
                                            <a href="{{route('cart.rapid.add', $categoryProduct->alias)}}" class="function-link">Add To Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <a href="{{route('single.product', $categoryProduct->alias)}}" class="product-name"><span>{{$categoryProduct->name}}</span></a>
                                        <div class="product-rating">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <div class="wrap-price"><span class="product-price">${{$categoryProduct->price}}</span></div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
        <!--Shop by Store -->
        <div class="wrap-show-advance-info-box style-1 box-in-site">
            <h3 class="title-box">Shop by Store</h3>
            <div class="wrap-products">
                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                    @foreach($shops as $shop)
                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{route('shop.store', $shop->alias)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="{{asset($shop->logo)}}" width="800" height="800" alt="shop-logo"></figure>
                            </a>
                            {{--<div class="group-flash">
                                <span class="flash-item new-label">{{$shop->shop_name}}</span>
                            </div>--}}
                        </div>
                        <div class="product-info">
                            <a href="{{route('shop.store', $shop->alias)}}" class="shop-name"><span>{{$shop->shop_name}}</span></a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div><!--End wrap-products-->
        </div>

        <!--Brand by Store -->
        <div class="wrap-show-advance-info-box style-1 box-in-site">
            <h3 class="title-box">Brand by Store</h3>
            <div class="wrap-products">
                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                    @foreach($brands as $brand)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('brand.store', $brand->alias)}}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{asset($brand->logo)}}" width="800" height="800" alt="shop-logo"></figure>
                                </a>
                                {{--<div class="group-flash">
                                    <span class="flash-item new-label">{{$shop->shop_name}}</span>
                                </div>--}}
                            </div>
                            <div class="product-info">
                                <a href="{{route('brand.store', $brand->alias)}}" class="shop-name"><span>{{$brand->name}}</span></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div><!--End wrap-products-->
        </div>

    </div>

@endsection


