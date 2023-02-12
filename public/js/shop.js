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

        function writeItemsCount(cost, count) {
            $(".modal-cost").html(`<i class="cost">${cost}</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' + ' за ' + count + ' шт.');
        }

        $('#goodsId').val(itemId);

        rangeText.val(1);
        range.val(1);

        writeItemsCount(itemCost, rangeText.val());

        $('#modalItemTitle').html('Покупка: «' + itemName + '»');

        range.on("change", function () {
            let itemsCost = this.value * itemCost;
            rangeText.val(this.value);
            writeItemsCount(itemsCost, rangeText.val());
        });

        rangeText.on("input change", function () {
            // Валидация инпута с кол-вом предмета
            rangeText.val(parseInt(rangeText.val()));
            if (rangeText.val() > 999) {
                rangeText.val(999);
            }
            if (rangeText.val() < 1) {
                rangeText.val('');
            }
            if (isNaN(rangeText.val())) {
                rangeText.val('');
            }
            if (rangeText.val() === '') {
                rangeText.val(0)
            }

            let itemsCost = this.value * itemCost;
            writeItemsCount(itemsCost, rangeText.val());

            range.val(this.value);
        });
    });
});
