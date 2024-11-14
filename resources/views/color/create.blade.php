@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create color</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">main</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('color.index') }}">colors</a></li>
                        <li class="breadcrumb-item active">create</li>
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
                <form action="{{ route('color.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        #<input name="title" id="title" class="mb-3" type="text" placeholder="title" size="6" onchange="setBarColor()">
                        <div id="bar" style="width: 25px; height: 25px; "></div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        function setBarColor() {
            var colorRGBCode = document.getElementById('title').value
            if (!colorRGBCode) {
                colorRGBCode = 'efefef'
            }
            document.getElementById('bar').style.background = '#' + colorRGBCode;
        }
    </script>
@endsection

