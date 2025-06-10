@extends('layouts.layout')

@section('title', 'Материалы продукта')

@section('content')
    <a href="{{ route('products.index') }}" class="btn">Назад</a>

    <div class="container">
        <h1>Материалы используемые для продукта: {{ $product->name }}</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Наименование материала</th>
                    <th>Количество</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materials as $material)
                    <tr>
                        <td>{{ $material->material->name }}</td>
                        <td>{{ $material->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
