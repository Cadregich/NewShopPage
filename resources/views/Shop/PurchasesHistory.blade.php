@extends('layouts/document')
@section('links')
    <link rel="stylesheet" href="{{ asset('css/purchases_history.css') }}">
@endsection
@section('title')
    История покупок
@endsection
@section('body')
    <div class="main-container">
        <div class="purchases-container">
            <h3 class="purchases-header mt-3 mt-sm-0 ml-sm-0">Блоки и предметы</h3>
            <div class="purchases-table mt-2 mt-mg-3">
                <table class="table text-white">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Предмет</th>
                        <th scope="col">Время</th>
                        <th scope="col">Цена</th>
                    </tr>
                    </thead>
                    <tbody id="purchases-table-body">
                    {{-- Таблицу заполняет purchases.js --}}
                    </tbody>
                </table>
                <div id="purchase-load-more-butt-area">
                    <button id="load-more-button">Загрузить ещё</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/purchases.js') }}"></script>
@endsection
