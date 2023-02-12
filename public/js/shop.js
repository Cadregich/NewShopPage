$(document).ready(function () {
    // Выводим баланс из верхней панели в отдельный блок при низкой ширине экрана
    function adaptiveBalanceBoard() {
        if ($(document).width() < 1150) {
            $('#normal-screen-balance-block').hide();
            $('#normal-screen-purchases-history-butt').hide();
            $('#low-screen-balance-block-items').show();
            $('#search-and-filter').css('justify-content', 'center');
        } else {
            $('#low-screen-balance-block-items').hide();
            $('#normal-screen-purchases-history-butt').show();
            $('#normal-screen-balance-block').show();
            $('#search-and-filter').css('justify-content', 'start');
        }
    }
    adaptiveBalanceBoard();
    $(window).resize(adaptiveBalanceBoard, function () {
        adaptiveBalanceBoard();
        console.log($(window).width());
    });

    // Работа с модальным окном
    $('.card-btn').click(function () {
        let rangeText = $("#buy-item-range");
        let range = $("#itemRange");
        let itemCost = $(this).attr('item-cost');
        let itemName = $(this).attr('item-name');
        let itemId = Number($(this).attr('item-id'));

        $('#goodsId').val(itemId);

        rangeText.val(1);
        range.val(1);

        $('#modalItemTitle').html('Покупка: «' + itemName + '»');

        $(".modal-cost").html(`<i class="cost">${itemCost}</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' + ' за ' + 1 + ' шт.');

        range.on("change", function () {
            let itemsCost = this.value * itemCost;
            rangeText.val(this.value);
            $(".modal-cost").html(`<i class="cost">${itemsCost}</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' + ' за ' + this.value + ' шт.');
        });

        rangeText.on("input change", function () {
            // Валидация инпута с кол-вом предмета
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

            if (rangeText.val() === '') {
                range.val(1);
                $(".modal-cost").html(`<i class="cost">${itemCost}</i>`
                    + ' <i class="fa-solid fa-coins modal-coins"></i>'
                    + ' за ' + 1 + ' шт.');
            } else {
                $(".modal-cost").html(`<i class="cost">${itemsCost}</i>`
                    + ' <i class="fa-solid fa-coins modal-coins"></i>'
                    + ' за ' + this.value + ' шт.');
            }

            range.val(this.value);
        });
    });
});
