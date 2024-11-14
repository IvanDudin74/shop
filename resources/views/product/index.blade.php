@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">main</a></li>
                        <li class="breadcrumb-item active">products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Create new product</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>title</th>
                                    <th>description</th>
                                    <th>content</th>
                                    <th>preview_image</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>is_published</th>
                                    <th>category</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><a href="{{ route('product.show', $product->id) }}" title="more info">{{ Str::limit($product->title, 15) }}</a></td>
                                        <td><a href="{{ route('product.show', $product->id) }}" title="more info">{{ Str::limit($product->description, 8) }}</a></td>
                                        <td><a href="{{ route('product.show', $product->id) }}" title="more info">{{ Str::limit($product->content, 8) }}</a></td>
                                        <td style="text-align: center; ">
                                            <a href="{{ route('product.show', $product->id) }}" title="more info">
                                                <img src="{{ ($product->productImages->first()) ? asset('storage/' . $product->productImages->first()->file_path) : asset('storage/images/default.jpg')}}" style="height: 30px;" alt="preview_image">
                                            </a>
                                        </td>
                                        <td><a href="{{ route('product.show', $product->id) }}" title="more info">{{ $product->quantity }}</a></td>
                                        <td><a href="{{ route('product.show', $product->id) }}" title="more info">{{ $product->price }}</a></td>
                                        <td><a href="{{ route('product.show', $product->id) }}" title="more info">{{ $product->isPublishedAsText }}</a></td>
                                        <td><a href="{{ route('product.show', $product->id) }}" title="more info">{{ ($product->category) ? $product->category->title : '' }}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

