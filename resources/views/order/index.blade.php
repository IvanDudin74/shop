@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">main</a></li>
                        <li class="breadcrumb-item active">orders</li>
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

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>date</th>
                                    <th>user (email)</th>
                                    <th>total_sum</th>
                                    <th>is_paid</th>
                                    <th>is_shipped</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td><a href="{{ route('order.show', $order->id) }}" title="more info">{{ $order->dateInFormat }}</a></td>
                                        <td><a href="{{ route('order.show', $order->id) }}" title="more info">{{ $order->user->email }}</a></td>
                                        <td><a href="{{ route('order.show', $order->id) }}" title="more info">{{ $order->total_sum }}</a></td>
                                        <td><a href="{{ route('order.show', $order->id) }}" title="more info">{{ $order->isPaidAsText }}</a></td>
                                        <td><a href="{{ route('order.show', $order->id) }}" title="more info">{{ $order->isShippedAsText }}</a></td>
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

