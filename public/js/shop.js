$(document).ready(function () {
    // Выводим баланс из верхней панели в отдельный блок при низкой ширине экрана
    if ($(document).width() < 1000) {
        $('#normal-screen-balance-block').hide();
        $('#low-screen-width-balance').show();
        $('#search-end-filter').css('justify-content', 'center');
    }
    // Работа с модальным окном
    $('.card-btn').click(function () {
        let rangeText = $(".buy-item-range");
        let range = $("#itemRange");
        let itemCost = $(this).attr('item-cost');
        let itemName = $(this).attr('item-name');

        $('#exampleModalLabel').html('Покупка: «' + itemName + '»');

        $(".modal-cost").html(`<i class="cost">${itemCost}</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' +
            ' за ' + 1 + ' шт.');

        range.on("change", function () {
            let itemsCost = this.value * itemCost;
            rangeText.val(this.value);
            $(".modal-cost").html(`<i class="cost">${itemsCost}</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' +
                ' за ' + this.value + ' шт.');
        });

        $(document).on('input change', '.buy-item-range', function () {
            // Валидация инпута с кол-вом предмета.
            rangeText.val(parseInt(rangeText.val()));
            if (rangeText.val() > 999) {
                rangeText.val(999);
            }
            if (rangeText.val() < 1) {
                rangeText.val(1);
            }
            if (isNaN(rangeText.val())) {
                rangeText.val(1);
            }
            let itemsCost = this.value * itemCost;
            // range.val($(this).val());
            if (rangeText.val() === '') {
                range.val(1);
                $(".modal-cost").html(`<i class="cost">${itemCost}</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' +
                    ' за ' + 1 + ' шт.');
            } else {
                $(".modal-cost").html(`<i class="cost">${itemsCost}</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' +
                    ' за ' + this.value + ' шт.');
            }
        });
        $('.btn-danger, .modal-close').click(function () {
            rangeText.val(1);
            range.val(1);
        });
    });
});
