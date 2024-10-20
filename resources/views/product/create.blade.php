@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Create product</li>
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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input name="title" type="text" placeholder="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    @error('title')
                        <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="description" type="text" placeholder="description" class="form-control" value="{{ old('description') }}">
                    </div>
                    @error('description')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <textarea name="content" placeholder="content" class="form-control">{{ old('content') }}</textarea>
                    </div>
                    @error('content')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group w-75">
                        <label for="exampleInputFile">Create preview image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image" value="">
                                <label class="custom-file-label">Choose image</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    @error('preview_image')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="quantity" type="text" placeholder="quantity" class="form-control" value="{{ old('quantity') }}">
                    </div>
                    @error('quantity')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="price" type="text" placeholder="price" class="form-control" value="{{ old('price') }}">
                    </div>
                    @error('price')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <select name="category_id" class="form-control select2">
                            <option disabled selected>Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <select name="tag_ids[]" class="tags" multiple="multiple" data-placeholder="Select a tags" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('tag_ids[]')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <select name="color_ids[]" class="colors" multiple="multiple" data-placeholder="Select a colors" style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('color_ids[]')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

