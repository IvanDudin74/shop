@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit user</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Edit user</li>
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
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input name="id" type="text" class="form-control" value="{{ 'ID: ' . $user->id }}" disabled>
                    </div>

                    <div class="form-group">
                        <input name="name" type="text" placeholder="name" class="form-control" value="{{ $user->name ?? old('name') }}">
                    </div>
                    @error('name')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="patronymic" type="text" placeholder="patronymic" class="form-control" value="{{ $user->patronymic ?? old('patronymic') }}">
                    </div>
                    @error('patronymic')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="surname" type="text" placeholder="surname" class="form-control" value="{{ $user->surname ?? old('surname') }}">
                    </div>
                    @error('surname')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="address" type="text" placeholder="address" class="form-control" value="{{ $user->address ?? old('address') }}">
                    </div>
                    @error('address')
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

