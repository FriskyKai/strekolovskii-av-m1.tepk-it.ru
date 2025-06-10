@extends('layouts.layout')

@section('title', 'Редактирование продукта')

@section('content')
    <a class="btn" href="{{ route('products.index') }}">Назад</a>

    <form class="container" action="{{ route('products.update', $product->id) }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf

        @if($errors->any())
            <script>
                alert("Ошибка валидации данных. Изучите ошибки валидации и исправьте данные.")
            </script>
        @endif

        <div>
            @error('product_type_id')
                <p class="warning">{{ $message }}</p>
            @enderror

            <label>Тип продукции:</label>
            <select name="product_type_id">
                @foreach($types as $type)
                    <option value="{{ $type->id }}" @if($type->id === $product->productType->id) selected @endif>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            @error('name')
                <p class="warning">{{ $message }}</p>
            @enderror

            <label>Наименование продукта:</label>
            <input type="text" name="name" placeholder="Введите название продукта" value="{{ $product->name }}">
        </div>
        <div>
            @error('article')
                <p class="warning">{{ $message }}</p>
            @enderror

            <label>Артикул:</label>
            <input type="text" name="article" placeholder="Введите артикул" value="{{ $product->article }}">
        </div>
        <div>
            @error('min_price')
                <p class="warning">{{ $message }}</p>
            @enderror

            <label>Мин.стоимость для партнёра:</label>
            <input type="number" name="min_price" min="0.01" step="0.01" placeholder="Введите мин.стоимость" value="{{ $product->min_price }}">
        </div>
        <div>
            @error('width')
                <p class="warning">{{ $message }}</p>
            @enderror

            <label>Ширина рулона:</label>
            <input type="number" name="width" min="0.01" step="0.01" placeholder="Введите ширину рулона" value="{{ $product->width }}">
        </div>

        <button class="btn" type="submit">Обновить данные</button>
    </form>
@endsection
