@extends('layouts.app')

@section('content')
    <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>Rp. {{ $product->retail_price }}</td>
                            <td>Rp. {{ $product->retail_price * $product->pivot->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Your cart is empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
    </div>
@endsection
