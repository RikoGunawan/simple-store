@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <h1>{{ $product->name }}</h1>
            <p>
                {{ $product->description }}
            </p>

            <table class="table table-primary">
                <tbody>
                    <tr>
                        <td><b>Retail Price</b></td>
                        <td>{{ $product->retail_price }}</td>
                    </tr>
                    <tr>
                        <td><b>Wholesale Price</b></td>
                        <td>{{ $product->wholesale_price }}</td>
                    </tr>
                    <tr>
                        <td><b>Retail Price</b></td>
                        <td>{{ $product->min_wholesale_qty }}</td>
                    </tr>
                    <tr>
                        <td><b>Retail Price</b></td>
                        <td>{{ $product->quantity }}</td>
                    </tr>
                </tbody>
            </table>
    </div>

    </main>
    </div>
@endsection
