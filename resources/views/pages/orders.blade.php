@extends('layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-footer text-center">
                        <a href="{{ route('save') }}" class="btn btn-primary btn-lg">Add item</a>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('orders') }}">Orders</a>
                        </li>
                    </ul>
                    <table class="table table-sm col-md-12">
                        <thead class="table-info">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Total</th>
                            <th scope="col">Shipping total</th>
                            <th scope="col">Create time</th>
                            <th scope="col">Timezone</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->shipping_total }}</td>
                                <td>{{ $order->create_time }}</td>
                                <td>{{ $order->timezone }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
