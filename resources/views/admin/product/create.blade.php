@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">New Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            @if($errors->count() > 0)
                                <ul class="list-group">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">New Product Create</h3>
                            </div>
                            <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            <select name="category_id" class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="logo" class="col-sm-2 col-form-label">Product Image</label>
                                        <div class="col-sm-3">
                                            <img src="" alt="product-image" class="img-responsive" style="width: 60px; height: 50px">
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="file" name="image" class="form-control" id="logo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="price" class="form-control" id="price" placeholder="Price">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="description" id="" cols="10" rows="4"></textarea>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <a href="{{route('admin.products.index')}}" class="btn btn-info">Cancel</a>
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
