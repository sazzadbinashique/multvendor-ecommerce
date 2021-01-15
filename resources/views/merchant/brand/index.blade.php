@extends('backend.layouts.app')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All brand</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">brands</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title float-right">
                                    <a href="{{route('merchant.brands.create')}}" class="btn btn-success btn-group-sm">Add New</a>
                                </h3>
                                <div class="card-tools float-left">
                                    <div class="input-group">
                                        <input type="text" name="table_search" class="form-control" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Logo</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $brands as $brand)
                                        <tr>
                                            <td>{{$brand->id}}</td>
                                            <td><a href="{{route('merchant.brands.edit', $brand->id)}}">{{$brand->name}}</a></td>
                                            <td>
                                                <img src="{{asset($brand->logo)}}" alt="brand-logo" style="width: 60px; height: 40px;">
                                            </td>
                                            <td>{{$brand->created_at}}</td>
                                            <td>{{$brand->updated_at}}</td>
                                            <td>
                                                <span class="">{{($brand->status == 1)? 'Active': 'Inactive'}}</span>
                                            </td>


                                            <td>
                                                <form action="{{ route('merchant.brands.destroy', $brand->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div class="card-footer clearfix">
                                {{$brands->links()}}
                            </div>

                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
