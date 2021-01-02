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
                            <li class="breadcrumb-item active">profile</li>
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
                    @if(!empty($user))
                        <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="{{asset($user->avatar)}}" alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center">{{$user->name}}</h3>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Other infomation</h3>
                                </div>
                                <div class="card-body">
                                    <strong><i class="far fa-file-alt mr-1"></i>Email</strong>
                                    <p class="text-muted">{{$user->email}}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">ChangePassword</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <form action="{{route('merchant.update.profile')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            {{csrf_field()}}
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="Merchant Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email"  class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
                                                <div class="col-sm-3">
                                                    <img src="{{asset($user->avatar)}}" alt="shop-logo" class="img-responsive" style="width: 60px; height: 50px">
                                                </div>
                                                <div class="col-sm-7">
                                                    <input type="file" name="avatar" class="form-control" id="logo">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-10 col-sm-2">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <form action="{{route('merchant.updatePassword')}}" method="POST"  class="form-horizontal">
                                            {{csrf_field()}}
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2 col-form-label">password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="bg-danger">{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmed password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirmed password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-10 col-sm-2">
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.card-body -->
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
