@extends('layouts/document')
@section('links')
        <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection
@section('title')Магазин предметов@endsection
@section('body')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-up-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Покупка: «Гибридная солнечная панель»</h5>
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('data') }}" id="buy-form" method="get">
                        @csrf
                        <center><input class="buy-item-range" value="1" name="items-count"></center>
                        <input value="1" type="range" class="form-range" min="1" max="100" step="1" id="customRange3" >
                    </form>
                    <label for="customRange3" class="buy-label">Выберите колличество</label>
                    <p class="modal-cost">

                    </p>

                </div>
                <div class="modal-footer">
                    <input type="submit" form="buy-form" class="btn btn-primary" value="Перейти к оплате">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Отменить</button>
                </div>
            </div>
        </div>
    </div>

        <i id="fa-regular fa-coin-blank"></i>
        <div id="container">
{{--                Low screen width balance panel--}}
            <div id="low-screen-width-balance" style="display:none;">
                <div id="balance-low-screen">
                    <div id="balance-low-screen-balance">
                        <nobr id="balance-text">Ваш баланс</nobr>
                        <br>
                        999999
                        <i class="fa-solid fa-coins" id="balance-coins"></i>
                    </div>
                    <button class="butt" id="balance-butt">Пополнить</button>
                </div>
            </div>
{{--                ./Low screen width balance panel--}}
            <div id="shop-header-panel">
                <div id="shop-header-panel-body">

                    <div id="search-end-filter">
                        <form method="get" id="form-search">
                            <input id="search" type="text" name="search" placeholder="Поиск предметов">
                            <button id="sub-search" type="submit"></button>
                        </form>
                        <button class="butt" id="mod-butt">Выбрать мод</button>
                    </div>

                    <div id="normal-screen-balance-block">
                        <div id="balance">
                            <nobr id="balance-text">Ваш баланс</nobr>
                            <br>
                            999999 <i class="fa-solid fa-coins" id="balance-coins"></i>
                        </div>
                        <button class="butt" id="balance-butt">Пополнить</button>
                    </div>

                </div>
            </div>
        </div>
        <div id="cards-area">
            @for ($i = 0; $i < 60; $i++)
                <div class="card">
                    <img src="{{ URL::asset('img/Hybrid_Solar_Panel_y2uSWXI.png') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <div class="card-title">
                            <center>
                                <h4>Гибридная солнечная панель</h4>
                            </center>
                        </div>
                        <div class="card-text">
                            Advanced solar panels
                        </div>
                        <center>
                            <button class="butt card-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                999
                                <i class="fa-solid fa-coins" id="card-coins"></i>
                            </button>
                        </center>
                    </div>
                </div>
            @endfor
        </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/shop.js') }}"></script>
@endsection
