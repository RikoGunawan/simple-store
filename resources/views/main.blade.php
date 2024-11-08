@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url()->current() }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search products..."
                    value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top h-200"
                            src="
                        @isset($product->photo)
                            {{ Storage::url($product->photo) }}
                        @else
                            {{ 'https://placehold.co/200' }}
                        @endisset"
                            alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}
                                <span class="badge bg-primary">{{ $product->category->name ?? 'Uncategorized' }}</span>
                            </h5>

                            <p class="card-text">Rp. {{ $product->retail_price }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('products.show', $product) }}" type="button"
                                        class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                                @auth
                                    <form action="{{ route('cart.add', $product) }}" method="POST">
                                        @csrf
                                        <input type="number" name="quantity" value="1">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Add to Cart</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $products->links() }}
        </div>
    </div>
@endsection
