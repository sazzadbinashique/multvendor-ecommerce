@extends('frontend.layouts.app')

@section('content')

    <div class="container">
        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                <div class="item-slide">
                    <img src="assets/images/main-slider-1-1.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-1">
                        <h2 class="f-title">Kid Smart <b>Watches</b></h2>
                        <span class="subtitle">Compra todos tus productos Smart por internet.</span>
                        <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div>
                </div>
                <div class="item-slide">
                    <img src="assets/images/main-slider-1-2.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-2">
                        <h2 class="f-title">Extra 25% Off</h2>
                        <span class="f-subtitle">On online payments</span>
                        <p class="discount-code">Use Code: #FA6868</p>
                        <h4 class="s-title">Get Free</h4>
                        <p class="s-subtitle">TRansparent Bra Straps</p>
                    </div>
                </div>
                <div class="item-slide">
                    <img src="assets/images/main-slider-1-3.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-3">
                        <h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
                        <span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
                        <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="assets/images/home-1-banner-1.jpg" alt="" width="580" height="190"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="assets/images/home-1-banner-2.jpg" alt="" width="580" height="190"></figure>
                </a>
            </div>
        </div>

        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">Best Sale</h3>
            <div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
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
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt=""></figure>
                </a>
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
                                            <a href="#" class="function-link">Add To Cart</a>
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
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
                </a>
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

    </div>

@endsection


