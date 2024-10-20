@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Edit product</li>
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
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input name="title" type="text" placeholder="title" class="form-control" value="{{ $product->title }}">
                    </div>
                    @error('title')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="description" type="text" placeholder="description" class="form-control" value="{{ $product->description }}">
                    </div>
                    @error('description')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <textarea name="content" placeholder="content" class="form-control">{{ $product->content }}</textarea>
                    </div>
                    @error('content')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group w-75 mb-5">
                        <div class="w-25">
                            <img src="{{ ($product->preview_image == '') ? asset('storage/images/default.jpg') : asset('storage/' . $product->preview_image) }}" style="height: 100px;">
                        </div>
                        <label for="exampleInputFile">Update preview image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image" value="{{ $product->preview_image }}">
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
                        <input name="quantity" type="text" placeholder="quantity" class="form-control" value="{{ $product->quantity }}">
                    </div>
                    @error('quantity')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="price" type="text" placeholder="price" class="form-control" value="{{ $product->price }}">
                    </div>
                    @error('price')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="is_published" name="is_published" {{ ($product->is_published) ? 'checked' : ''}}>
                        <label class="form-check-label" for="is_published">publish</label>
                    </div>

                    <div class="form-group">
                        <select name="category_id" class="custom-select form-control-border" id="exampleSelectBorder">
                            <option disabled selected>Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ ($product->category_id == $category->id) ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <select name="tag_ids[]" class="tags" multiple="multiple" data-placeholder="tags" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option {{ is_array($product->tags->pluck('id')->toArray()) && (in_array($tag->id, $product->tags->pluck('id')->toArray())) ? 'selected' : '' }} value="{{ $tag->id }}">
                                    {{ $tag->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('tag_ids[]')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <select name="color_ids[]" class="colors" multiple="multiple" data-placeholder="colors" style="width: 100%;">
                            @foreach($colors as $color)
                                <option {{ is_array($product->colors->pluck('id')->toArray()) && (in_array($color->id, $product->colors->pluck('id')->toArray())) ? 'selected' : '' }} value="{{ $color->id }}">
                                    {{ $color->title }}
                                </option>
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

