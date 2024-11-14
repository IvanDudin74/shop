@extends('layouts.main')
@section('content')
    <form action="{{ route('product_image.delete', $productImage->id) }}" method="post">
        @csrf
        @method('delete')
        <img src="{{ asset('storage/' . $productImage->file_path) }}" style="height: 300px;">
        <button title="Delete" style="border: 0 solid"><span style="color: red">X</span></button>
    </form>
@endsection
