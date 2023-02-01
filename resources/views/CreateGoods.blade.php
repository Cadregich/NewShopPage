@extends('layouts/document')
@section('title')
    Добавление товара
@endsectionё
@section('links')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection
@section('body')

    <form method="post" action="{{ route('store') }}" class="text-center w-25 m-auto" enctype="multipart/form-data">
        @csrf
        <div class="h1 mt-3 mb-5">Добавить предмет</div>
        <div class="mb-3 ">
            <label for="addItemName" class="form-label">Название</label>
            <input type="text" class="form-control" name="name" id="addItemName">
        </div>
        <div class="mb-3">
            <label for="mods-inputs" class="form-label">Мод</label><br>
            <div id="mods-inputs">
                <input class="form-control" id="mod-select-text" name="mod_id" placeholder="Добавить новый мод">
                <select class="form-select" id="mod-select-input" name="mod_id">
                    <option selected id="mod-selected">Выбрать мод</option>
                    @foreach($mods as $mod)
                        <option value="{{ $mod->id }}">{{ $mod->title }}</option>
                    @endforeach
                </select>
            </div>
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
        @if (session('status'))
            <div class="text-success mt-3">
                {{ session('status') }}
            </div>
        @endif
    </form>

@endsection
@section('scripts')
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
@endsection
