@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        <div class="container-fluid">
            <a class="btn btn-primary" href="{{ route('products.create') }}">Add New</a>
            <main>
                <table class="table table-striped table-hover border-primary mt-3">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Photo</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Retail Price</th>
                            <th>Wholesale Price</th>
                            <th>Min. Wholesale Qty</th>
                            <th>Qty</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <img src="{{ Storage::url($product->photo) }}" class="img-thumbnail w-50">
                                </td>
                                <td>
                                    <a href="{{ route('products.show', $product) }}">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->retail_price }}</td>
                                <td>{{ $product->wholesale_price }}</td>
                                <td>{{ $product->min_wholesale_qty }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class = "btn btn-warning" href="{{ route('products.edit', $product) }}">
                                            Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </main>
            {{-- <button class="btn btn-primary" href="{{ route('book.form') }}">Tambah Buku</button> --}}
        </div>
    </div>
@endsection
