@extends('layouts/document')
@section('links')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection
@section('title')
    Магазин предметов
@endsection
@section('body')
    {{-- Thanks-modal --}}
    @include('Items.ThanksModal')
    {{-- Buy-modal --}}
    @include('Items.BuyModal')
    {{-- Low screen width balance panel --}}
    @include('Items.LowScreenBalanceBoard')

    {{-- Shop head panel --}}
    <div id="shop-header-panel">
        <div id="shop-header-panel-body">
            <form method="get" id="search-and-filter-mods">
                {{-- Search form --}}
                <div id="form-search">
                    <input id="search" type="text" name="search" placeholder="Поиск предметов">
                    <button id="sub-search" type="submit"
                            title="Простым нажатием на лупу можно сбросить параметры поиска"></button>
                </div>
                {{-- /.Search form --}}
                @csrf
                {{-- Select mod button --}}
                <div class="btn-group">
                    <button class="butt dropdown-toggle" id="mod-butt" type="button"
                            data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        Выбрать мод
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-sm-start">
                        @foreach($mods as $mod)
                            <button class="dropdown-item" type="submit" name="mod" value="{{ $mod }}">
                                {{ $mod }}
                            </button>
                        @endforeach
                    </ul>
                </div>
                {{-- /.Select mod button --}}
                <div class="purchases-history-butt-area">
                    <a class="butt purchases-history-butt" id="normal-screen-purchases-history-butt"
                       href="{{ route('history') }}">Покупки
                    </a>
                </div>
            </form>
            {{-- Normal screen balance block --}}
            <div id="normal-screen-balance-block">
                <div id="balance">
                    <nobr id="balance-text">Ваш баланс</nobr>
                    <br>
                    999999 <i class="fa-solid fa-coins" id="balance-coins"></i>
                </div>
                <button class="butt" id="balance-butt">Пополнить</button>
            </div>
            {{-- /.Normal screen balance block --}}
        </div>
    </div>
    {{-- /.Shop head panel --}}
    {{-- Cards area --}}
    <div id="cards-area">
        {{-- Cards --}}
        @foreach($goods as $goodsUnit)
            <div class="card">
                <img class="card-img-top" alt="{{ $goodsUnit->name }}"
                     src="{{ URL::asset('storage/uploads/'.$goodsUnit->img) }}">
                <div class="card-body">
                    <div class="card-title">
                        <h4>{{ $goodsUnit->name }}</h4>
                    </div>
                    <div class="card-text">
                        {{ \App\Models\Mods::find($goodsUnit->mod_id)->title }}
                    </div>
                    <div class="card-button-area">
                        <button class="butt card-btn" item-name="{{ $goodsUnit->name }}"
                                item-id="{{ $goodsUnit->id }}" item-cost="{{ $goodsUnit->price }}"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                            {{ $goodsUnit->price }}
                            <i class="fa-solid fa-coins" id="card-coins"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- /.Cards --}}
        <div style="width: 100%">{{--Блок-костыль что-бы пагинатор был всегда снизу карточек--}}</div>
        {{-- Paginator --}}
        <div class="mt-3">
            {{ $goods->onEachSide(0)->links() }}
        </div>
        {{-- /.Paginator --}}
    </div>
    {{-- /.Cards area --}}
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/shop.js') }}"></script>
    {{-- Thanks-modal-handler --}}
    @if (session('status'))
        <script>
            $(document).ready(function () {
                $('.status-modal').modal('show');
                setTimeout(function () {
                    $('.status-modal').modal('hide');
                }, 10000);
            });
        </script>
    @endif
    {{-- /.Thanks-modal-handler --}}
@endsection
