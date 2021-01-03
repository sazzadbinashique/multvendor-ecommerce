@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Banner</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">New Banner</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-2">

                        <div class="card card-info">
                            @if($errors->count() > 0)
                                <ul class="list-group notification-object">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">New Banner Create</h3>
                            </div>
                            <form action="{{route('admin.banners.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="sub_title" class="col-sm-2 col-form-label">Sub Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="sub_title" value="{{old('sub_title')}}" class="form-control" id="sub_title" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Banner Image</label>
                                        <div class="col-sm-3">
                                            <img src="{{asset('adminlte/dist/img/default-150x150.png')}}" alt="shop-logo" class="img-responsive" style="width: 60px; height: 50px;">
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="file" name="image" class="form-control" id="logo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="position" class="col-sm-2 col-form-label">Position</label>
                                        <div class="col-sm-10">
                                            <select name="position" class="form-control">
                                                <option value="0">Left</option>
                                                <option value="1">Right</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-2 col-form-label">URL </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="url" value="{{old('url')}}" class="form-control" id="url" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('admin.banners.index')}}" class="btn btn-info">Cancel</a>
                                    <button type="submit" class="btn btn-success float-right">Save</button>
                                </div>
                            </form>
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
