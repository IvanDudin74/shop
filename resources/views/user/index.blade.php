@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">main</a></li>
                        <li class="breadcrumb-item active">users</li>
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
                            <a href="{{ route('user.create') }}" class="btn btn-primary">Create new user</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>email</th>
                                    <th>name</th>
                                    <th>patronymic</th>
                                    <th>surname</th>
                                    <th>gender</th>
                                    <th>address</th>
                                    <th>role</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->email }}</a></td>
                                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a></td>
                                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->patronymic }}</a></td>
                                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->surname }}</a></td>
                                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->genderAsText }}</a></td>
                                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->address }}</a></td>
                                        <td><a href="{{ route('user.show', $user->id) }}">{{ $user->roleAsText }}</a></td>
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

