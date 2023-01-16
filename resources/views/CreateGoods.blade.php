@extends('layouts/document')
@section('title')Добавление товара@endsection
@section('body')

    <form method="post" action="{{ route('store') }}" class="text-center w-25 m-auto" enctype="multipart/form-data">
        @csrf
        <div class="h1 mt-3 mb-5">Добавить предмет</div>
        <div class="mb-3 ">
            <label for="addItemName" class="form-label">Название</label>
            <input type="text" class="form-control" name="name" id="addItemName">
        </div>
        <div class="mb-3">
            <label for="addItemMod" class="form-label">Мод</label>
            <input type="text" class="form-control" name="mod_id" id="addItemMod">
        </div>
        <div class="mb-3">
            <label for="addItemImage" class="form-label">Картинка</label>
            <input class="form-control" type="file" name="img" id="addItemImage">
        </div>
        <div class="mb-3">
            <label for="addItemPrice" class="form-label">Цена</label>
            <input type="text" class="form-control" name="price" id="addItemPrice">
        </div>
        <div class="mb-4">
            <label for="addItemAssociations" class="form-label">Ассоциации для поиска (через запятую)</label>
            <input type="text" class="form-control" name="associations" id="addItemAssociations">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

@endsection
