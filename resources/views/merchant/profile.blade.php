@extends('backend.layouts.app')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Shop</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                    @foreach($shops as $shop)
                        <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                             src="{{asset($shop->logo)}}"
                                             alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">{{$shop->shop_name}}</h3>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Other infomation</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i>Name</strong>
                                    <p class="text-muted">
                                        {{$shop->user->name}}
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-book mr-1"></i> Licence</strong>
                                    <p class="text-muted">
                                        {{$shop->licence}}
                                    </p>
                                    <hr>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>
                                    <p class="text-muted">{{$shop->address}}</p>
                                    <hr>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i>Mobile</strong>
                                    <p class="text-muted">{{$shop->mobile}}</p>
                                    <hr>
                                    <strong><i class="far fa-file-alt mr-1"></i>Email</strong>
                                    <p class="text-muted">{{$shop->user->email}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Setting Shop</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="settings">
                                        <form action="{{route('update.shop.profile')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            {{csrf_field()}}
                                            <div class="form-group row">
                                                <label for="shop_name" class="col-sm-2 col-form-label">Shop Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="shop_name" value="{{$shop->shop_name}}" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"  class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{$shop->user->email}}" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Merchant Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="shop_name" name="name" value="{{$shop->user->name}}" placeholder="Merchant Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="licence" class="col-sm-2 col-form-label">licence</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="licence" name="licence" value="{{$shop->licence}}" placeholder="Licence..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$shop->address}}" placeholder="Address...">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-2 col-form-label">Mobile</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$shop->phone}}" placeholder="Mobile">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="logo" class="col-sm-2 col-form-label">Shop Logo</label>
                                                <div class="col-sm-3">
                                                    <img src="{{asset($shop->logo)}}" alt="shop-logo" class="img-responsive">
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="file" name="logo" class="form-control" id="logo">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
    </div>

@endsection

@section('bscustomfile')
    <script>
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection
