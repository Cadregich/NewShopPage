@extends('layouts/document')
@section('links')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection
@section('title')
    История покупок
@endsection
@section('body')
    <div class="main-container">
        <div class="history-container">
            <h3 class="mt-2 mt-sm-0 ml-sm-0 table-header history-header">Блоки и предметы</h3>
            <div class="blocks-table mt-2 mt-mg-3">
                <table class="table text-white">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Предмет</th>
                        <th scope="col">Время</th>
                        <th scope="col">Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($purchasesExist)
                    @foreach($purchases as $purchase)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $purchase->goods_name }} ({{ $purchase->goods_count }})</td>
                            <td>{{ $purchase->created_at }}</td>
                            <td>{{ $purchase->purchase_price }}</td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script>

        $(window).resize(function () {
            console.log("Current window width: " + $(window).width());
        });
    </script>
@endsection
@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
@endsection
