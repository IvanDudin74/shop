@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">main</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('order.index') }}">orders</a></li>
                        <li class="breadcrumb-item active">order</li>
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
                                <form action="{{ route('order.update', $order->id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="submit" class="btn btn-primary" value="{{ ($order->is_shipped ? 'Check as not shipped' : 'Check as shipped') }}">
                                </form>
                            </div>
                            <form action="{{ route('order.delete', $order->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-primary" value="Delete">
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <td class="col-2">ID</td>
                                    <td>{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <td>date</td>
                                    <td>{{ $order->dateInFormat }}</td>
                                </tr>
                                <tr>
                                    <td>user-em@il</td>
                                    <td>{{ $order->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>user-address</td>
                                    <td>{{ $order->user->address }}</td>
                                </tr>
                                <tr>
                                    <td>products</td>
                                    <td>
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-hover">
                                                <thead>
                                                    <th>product-ID</th>
                                                    <th>product-title</th>
                                                    <th>product-price</th>
                                                    <th>product-quantity</th>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->productsAsJson as $product)
                                                        <tr>
                                                            <td>{{ $product['id'] }}</td>
                                                            <td>{{ $product['title'] }}</td>
                                                            <td>{{ $product['price'] }}</td>
                                                            <td>{{ $product['quantity'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>total_sum</td>
                                    <td>{{ $order->total_sum }}</td>
                                </tr>
                                <tr>
                                    <td>is_paid</td>
                                    <td>{{ $order->isPaidAsText }}</td>
                                </tr>
                                <tr>
                                    <td>is_shipped</td>
                                    <td>{{ $order->isShippedAsText }}</td>
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

