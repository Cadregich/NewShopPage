@extends('layouts/document')
@section('links')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection
@section('title')
    Магазин предметов
@endsection
@section('body')

    @if (session('status'))
        <div class="modal status-modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ session('status') }}</h5>
                        <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fa-solid fa-xmark"></i></button>
                    </div>
                    <div class="modal-body">
                        <p>Благодарим вас за покупку.</p>
                        Вы внесли свой вклад в развития нашего проекта.
                        <p>Ваши пожертвования помогают нам разваваться и существовать.</p>
                        <p>С свою очередь, мы продолжим развать наш проект и делать вас счастливее!</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{--Modal--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-up-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Покупка предмета</h5>
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                {{--Modal body--}}
                <div class="modal-body">
                    <form action="{{ route('data') }}" id="buy-form" method="post">
                        @csrf
                        <input type="hidden" name="item-id" id="goodsId">
                        <input type="text" class="buy-item-range" value="1" name="items-count">
                        <input value="1" type="range" class="form-range" min="1" max="100" step="1" id="itemRange">
                    </form>
                    <label for="customRange3" class="buy-label">Выберите колличество</label>
                    <p class="modal-cost"></p>
                    {{--/.Modal body--}}
                </div>
                <div class="modal-footer">
                    <input type="submit" form="buy-form" class="btn btn-primary" value="Перейти к оплате">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Отменить</button>
                </div>
            </div>
        </div>
    </div>
    {{--/.Modal--}}
    <i id="fa-regular fa-coin-blank"></i>
    <div id="container">
        {{--Low screen width balance panel--}}
        <div id="low-screen-block">
            <div id="low-screen-items" style="display:none;">
                <div id="low-screen-width-balance">
                    <div id="balance-low-screen">
                        <div id="balance-low-screen-balance">
                            <nobr id="balance-text">Ваш баланс</nobr>
                            <br>
                            999999
                            <i class="fa-solid fa-coins" id="balance-coins"></i>
                        </div>
                        <button class="butt" id="balance-butt">Пополнить</button>
                    </div>
                    <div class="drop-filters-and-history-low-screen">
                        <a href="{{ route('history') }}" class="butt reset-butt">Покупки</a>
                    </div>
                </div>
            </div>
        </div>
        {{--/.Low screen width balance panel--}}
        {{--Shop head panel--}}
        <div id="shop-header-panel">
            <div id="shop-header-panel-body">
                <div id="search-end-filter">
                    <form method="get" id="items-filter">
                        <div id="form-search">
                            <input id="search" type="text" name="search" placeholder="Поиск предметов">
                            <button id="sub-search" type="submit"
                                    title="Нажав на лупу можно сбросить параметры поиска"></button>
                        </div>
                        @csrf
                        <div class="btn-group">
                            <button type="button" class="butt btn-secondary dropdown-toggle" id="mod-butt"
                                    data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                Выбрать мод
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-sm-start">
                                @foreach($mods as $mod)
                                    <button type="submit" class="dropdown-item" name="mod" value="{{ $mod }}">
                                        {{ $mod }}
                                    </button>
                                @endforeach
                            </ul>
                        </div>
                        <div class="drop-filters-and-history">
                            <a href="{{ route('history') }}" class="butt reset-butt" id="reset-butt-normal-ss">Покупки</a>
                        </div>
                    </form>
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
        {{--/.Shop head panel--}}
    </div>
    {{--Cards area--}}
    <div id="cards-area">
        @foreach($goods as $goodsUnit)
            <div class="card">
                <img src="{{ URL::asset('storage/uploads/'.$goodsUnit->img) }}" class="card-img-top"
                     alt="{{ $goodsUnit->name }}">
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
        <div style="width: 100%">{{--Блок-костыль что-бы пагинатор был всегда снизу карточек--}}</div>
        <div class="mt-3">
            {{ $goods->onEachSide(0)->links() }}
        </div>
    </div>
    {{--/.Cards area--}}
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    @if (session('status'))
    <script>
        $(document).ready(function() {
            $('.status-modal').modal('show');
            setTimeout(function() {
                $('.status-modal').modal('hide');
            }, 5000);
        });
    </script>
    @endif
    <script src="{{ asset('js/shop.js') }}"></script>
@endsection
