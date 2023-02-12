<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-up-centered">
        <div class="modal-content">
            {{-- Modal header --}}
            <div class="modal-header">
                <h5 class="modal-title" id="modalItemTitle">Покупка предмета</h5>
                <button class="modal-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            {{-- /.Modal header --}}
            {{-- Modal body --}}
            <div class="modal-body">
                <form action="{{ route('data') }}" method="post" id="buy-form">
                    @csrf
                    <input id="goodsId" type="hidden" name="item-id">
                    <input id="buy-item-range" type="text" value="1" name="items-count">
                    <input class="form-range" id="itemRange" type="range" value="1" min="1" max="100" step="1">
                </form>
                <label class="buy-label" for="itemRange">Выберите колличество</label>
                <p class="modal-cost"></p>
            </div>
            {{-- /.Modal body --}}
            {{-- Modal footer --}}
            <div class="modal-footer">
                <input class="btn btn-primary" type="submit" form="buy-form" value="Перейти к оплате">
                <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Отменить</button>
            </div>
            {{-- /.Modal footer --}}
        </div>
    </div>
</div>
