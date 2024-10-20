@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create user</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Create user</li>
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
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input name="email" type="email" placeholder="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="password" type="password" placeholder="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    @error('password')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="password_confirmation" type="password" placeholder="repeat password" class="form-control" value="{{ old('password_confirmation') }}">
                    </div>
                    @error('password_confirmation')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="name" type="text" placeholder="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="patronymic" type="text" placeholder="patronymic" class="form-control" value="{{ old('patronymic') }}">
                    </div>
                    @error('patronymic')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="surname" type="text" placeholder="surname" class="form-control" value="{{ old('surname') }}">
                    </div>
                    @error('surname')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <select name="gender" class="custom-select form-control-border" id="exampleSelectBorder">
                            <option value="1" {{ (old('gender') == 1) ? 'selected' : '' }}>man</option>
                            <option value="2" {{ (old('gender') == 2) ? 'selected' : '' }}>woman</option>
                        </select>
                    </div>
                    @error('gender')
                    <div class="text-danger mb-5">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <input name="address" type="text" placeholder="address" class="form-control" value="{{ old('address') }}">
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

