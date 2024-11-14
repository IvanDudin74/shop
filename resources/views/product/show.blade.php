@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">main</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">products</a></li>
                        <li class="breadcrumb-item active">product</li>
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
                        <div class="card-header d-flex p-3">
                            <div class="mr-3">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-primary" value="Delete">
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <td class="col-2">ID</td>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <td>title</td>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr>
                                    <td>description</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <td>content</td>
                                    <td>{{ $product->content }}</td>
                                </tr>
                                <tr>
                                    <td>images</td>
                                    <td>
                                        @foreach($product->productImages as $productImage)
                                            <a href="{{ asset('storage/' . $productImage->file_path) }}">
                                                <img src="{{ asset('storage/' . $productImage->file_path) }}" style="height: 60px;">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>quantity</td>
                                    <td>{{ $product->quantity }}</td>
                                </tr>
                                <tr>
                                    <td>price</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <td>is published</td>
                                    <td>{{ $product->isPublishedAsText }}</td>
                                </tr>
                                <tr>
                                    <td>category</td>
                                    <td>{{ ($product->category) ? $product->category->title : '' }}</td>
                                </tr>
                                <tr>
                                    <td>colors</td>
                                    <td>
                                        @foreach($product->colors as $color)
                                            {{ '#' . $color->title . ' ' }}
                                            <div class="mr-3" style="display: inline-block; width: 15px; height: 15px; background: {{ '#' . $color->title }}; border: 1px solid;"></div>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>tags</td>
                                    <td>@foreach($product->tags as $tag) {{ $tag->title . ' ' }} @endforeach</td>
                                </tr>
                                <tr>
                                    <td>reviews</td>
                                    <td>
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>user-name</th>
                                                <th>content</th>
                                                <th>created_at</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($reviews as $review)
                                                <tr>
                                                    <td>{{ $review->user->name  }}</td>
                                                    <td>{{ $review->content }}</td>
                                                    <td>{{ $review->createdAtInFormat }}</td>
                                                    <td>
                                                        <form action="{{ route('review.delete', $review->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="submit" class="btn btn-primary" value="Delete">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
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

