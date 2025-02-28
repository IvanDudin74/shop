@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Color</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">main</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('color.index') }}">colors</a></li>
                        <li class="breadcrumb-item active">color</li>
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
                                <a href="{{ route('color.edit', $color->id) }}" class="btn btn-primary">Edit</a>
                            </div>
                            <form action="{{ route('color.delete', $color->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-primary" value="Delete">
                            </form>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td class="col-2">ID</td>
                                    <td>{{ $color->id }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>#{{ $color->title }}</td>
                                </tr>
                                <tr>
                                    <td>Sample</td>
                                    <td>
                                        <div style="width: 15px; height: 15px; background: {{ '#' . $color->title }}; border: 1px solid;"></div>
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

