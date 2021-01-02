<?php
$positions = [0 => 'slide-1', 1 => 'slide-2', 2=>'slide-3'];
$statuses = [1 => 'Active', 0 => 'Disabled'];
?>
@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Slider</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">New Slider</li>
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
                                <h3 class="card-title">New Slider Create</h3>
                            </div>
                            <form action="{{route('admin.sliders.update', $slider->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                {{csrf_field()}}
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="title" value="{{$slider->title}}" class="form-control" id="title" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Slider Image</label>
                                        <div class="col-sm-3">
                                            <img src="{{(!empty($slider->image))? asset($slider->image) : asset('adminlte/dist/img/default-150x150.png')}}" alt="shop-logo" class="img-responsive" style="width: 60px; height: 50px">
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="file" name="image" class="form-control" id="logo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="product_title" class="col-sm-2 col-form-label">Product Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="product_title" value="{{$slider->product_title}}" class="form-control" id="product_title" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="subtitle" class="col-sm-2 col-form-label">Sub Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="subtitle" value="{{$slider->subtitle}}" class="form-control" id="subtitle" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="price" value="{{$slider->price}}" class="form-control" id="price" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="position" class="col-sm-2 col-form-label">Position</label>
                                        <div class="col-sm-10">
                                            <select name="position" class="form-control">
                                                @foreach( $positions as $item=> $position)
                                                    <option value="{{ $position }}" {{ ($position === ($slider->position)) ? 'selected' : ''}}>{{$position}}</option>
                                                @endforeach;
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="link" class="col-sm-2 col-form-label">URL </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="link" value="{{$slider->link}}" class="form-control" id="link" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control">
                                                @if(!empty($statuses))
                                                    @foreach ($statuses as $k => $status):
                                                    <option value="{{$k}}" {{ ($k === ($slider->status)) ? 'selected' : ''}}>{{$status}}</option>
                                                    @endforeach;
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('admin.sliders.index')}}" class="btn btn-info">Cancel</a>
                                    <button type="submit" class="btn btn-success float-right">Update</button>
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
