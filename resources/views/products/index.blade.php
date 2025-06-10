@extends('layouts.layout')

@section('title', 'Список продуктов')

@section('content')
    <a class="btn" href="{{ route('products.create') }}">Создать продукт</a>

    @foreach($products as $product)
        <a href="/products/edit/{{$product->id}}">
            <div class="flex border">
                <div class="div85">
                    <p class="bigFontSize">{{ $product->productType->name }} | {{ $product->name }}</p>
                    <p>{{ $product->article }}</p>
                    <p>{{ $product->min_price }} (р)</p>
                    <p>{{ $product->width }} (м)</p>
                </div>
                <div class="div15 bigFontSize">{{ number_format($product->total_cost, 2) }} (р)</div>
            </div>
        </a>

        <a href="{{ route('products.materials', $product) }}" class="btn">Материалы</a>
    @endforeach
@endsection
