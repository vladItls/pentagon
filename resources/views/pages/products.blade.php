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
                            <a class="nav-link active" href="{{ route('index') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('orders') }}">Orders</a>
                        </li>
                    </ul>
                    <table class="table table-sm col-md-12">
                        <thead class="table-info">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">SKU</th>
                            <th scope="col">Image</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->sku }}</td>
                                <td><img src="{{ $product->image }}" alt="image"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
