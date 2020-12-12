<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light mt-13px bg-light">
        <img src="{{asset('assets/img/logo.png')}}" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Shows</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Backpak</a>
                </li>

                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/home')}}">Admin</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link " href="{{route('login')}}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('register')}}">Register</a>
                            </li>
                        @endif

                    @endauth


                @endif
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
<div class="container ">
    <div id="carouselExampleControls" class="carousel slide orange-bg" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row align-items-center">
                    <div class="col-md-7 ">
                        <h1>Mi LED TV 4A PRO 32</h1>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random <br> text. It has roots in a piece of classical Latin literature.
                        </p>
                        <h1 class="price">$1234</h1>
                        <button class="btn">Buy Now</button>
                    </div>
                    <div class="col-md-5">
                        <img class="d-block w-100" src="{{asset('assets/img/banner-images/tv.png')}}" alt="Second slide">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row align-items-center">
                    <div class="col-md-7 ">
                        <h1>Y-box to waste time</h1>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random <br> text. It has roots in a piece of classical Latin literature.</p>
                        <h1 class="price">$480</h1>
                        <button class="btn">Buy Now</button>
                    </div>
                    <div class="col-md-5 ">
                        <img class="d-block w-100" src="{{asset('assets/img/banner-images/xbox.png')}}" alt="Third slide">
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <h1>EAR BUD WARMER</h1>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random <br> text. It has roots in a piece of classical Latin literature.</p>
                        <H1 class="price">$560</H1>
                        <button class="btn">Buy Now</button>
                    </div>
                    <div class="col-md-5">
                        <img class="d-block w-100" src="{{asset('assets/img/banner-images/headphone.png')}}" alt="Third slide">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container categories">
    <div class="row ">
        <div class="col-md-4 ">
            <div class="d-flex justify-content-between cat1">
                <h1>Watch</h1>
                <img src="{{asset('assets/img/categories/watch.png')}}" alt="">
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="d-flex justify-content-between cat2">
                <h1>Bag</h1>
                <img src="{{asset('assets/img/categories/bag.png')}}" alt="">
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="d-flex justify-content-between cat3">
                <h1>Shoes</h1>
                <img src="{{asset('assets/img/categories/shoes.png')}}" alt="">
            </div>

        </div>
    </div>
</div>

<div class="container shoes" id="shoes">
    <h3>Shoes</h3>
    <div class="card-deck">
        <div class="card">
            <img src="{{asset('assets/img/shoes/shoe-1.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Supply 360</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action</p>
                <h1 class="price">$480</h1>
                <button class="btn">Buy Now</button>
            </div>
        </div>
        <div class="card">
            <img src="{{asset('assets/img/shoes/shoe-2.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Nike 480</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action</p>
                <h1 class="price">$480</h1>
                <button class="btn">Buy Now</button>
            </div>
        </div>
        <div class="card">
            <img src="{{asset('assets/img/shoes/shoe-3.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Red Airmax</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                <h1 class="price">$480</h1>
                <button class="btn">Buy Now</button>
            </div>
        </div>
    </div>
</div>

<div class="container bags" id="bags">
    <h3>Bags</h3>
    <div class="card-deck">
        <div class="card">
            <img src="{{asset('assets/img/bags/bag-1.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Supply 380</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action</p>
                <h1 class="price">$780</h1>
                <button class="btn">Buy Now</button>
            </div>
        </div>
        <div class="card">
            <img src="{{asset('assets/img/bags/bag-2.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Burton</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action</p>
                <h1 class="price">$980</h1>
                <button class="btn">Buy Now</button>
            </div>
        </div>
        <div class="card">
            <img src="{{asset('assets/img/bags/bag-3.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Black hug</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                <h1 class="price">$780</h1>
                <button class="btn">Buy Now</button>
            </div>
        </div>
    </div>
</div>

<div class="container d-flex align-items-center justify-content-center footer">
    <div>
        <h3>LET'S STAY IN TOUCH</h3>
        <h6>Get updates on sides,specails and more</h6>
        <input class="form-control" type="text">
        <button class="btn">Submit</button>
    </div>
</div>
<p></p>
<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
