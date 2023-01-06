@extends('layouts/document')
@section('links')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection
@section('body')
    <i class="fa-regular fa-coin-blank"></i>
    <div class="container">

        <div class="low-screen-width-balance">
            <div class="balance-low-screen">
                <div class="balance-low-screen-balance">
                    Ваш баланс
                    <br>
                    12344
                    <i class="fa-solid fa-coins"></i>
                </div>
                <button class="butt balance-butt">Пополнить</button>
            </div>
        </div>

        <div class="shop-header-panel">
            <div class="shop-header-panel-body">

                <div class="search-end-filter">
                    <form method="get" class="form-search">
                        <input class="search" type="text" name="search" placeholder="Поиск предметов">
                        <button class="sub-search" type="submit"></button>
                    </form>
                    <button class="butt mod-butt">Выбрать мод</button>
                </div>

                <div class="normal-screen-balance-block">
                    <div class="balance">
                        <nobr>Ваш баланс</nobr>
                        <br>
                        999999 <i class="fa-solid fa-coins"></i>
                    </div>
                    <button class="butt balance-butt">Пополнить</button>
                </div>

            </div>
        </div>
        <div class="cards-area">

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/shop.js') }}"></script>
@endsection
