@if (session('status'))
    <div class="modal status-modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- Modal header --}}
                <div class="modal-header">
                    <h4 class="modal-title">{{ session('status') }}</h4>
                    <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                {{-- /.Modal header --}}
                {{-- Modal body --}}
                <div class="modal-body thanks-modal-body">
                    <p>Благодарим вас за покупку.</p>
                    Вы внесли свой вклад в развития нашего проекта.
                    <p>Ваши пожертвования помогают нам разваваться и существовать.</p>
                    <p>С свою очередь, мы продолжим развать наш проект и делать вас счастливее!</p>
                </div>
                {{-- /.Modal body --}}
            </div>
        </div>
    </div>
@endif

