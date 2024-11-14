@extends('layouts.main')

@section('content')
    <div id="colorlib-notfound">
        <div class="colorlib-notfound">
            <div class="colorlib-notfound-404">
                <h3 id="colorlib_404_customizer_page_heading"></h3>
                <h1><span>{{ $errorMessage }}</span></h1>
            </div>
            <div class="card-header">
                <a href="{{ route('main.index') }}" class="btn btn-primary">OK</a>
            </div>
            <h2 id="colorlib_404_customizer_content"></h2>
        </div>
    </div>
@endsection

