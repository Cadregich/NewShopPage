$(document).ready(function () {
    //alert ($( document ).width());
    if ($(document).width() < 1000) {
        $('#normal-screen-balance-block').hide();
        $('#low-screen-width-balance').show();
        $('#search-end-filter').css('justify-content', 'center');
    }

    let rangeText = $(".buy-item-range");
    let range = $("#customRange3");
    $(".modal-cost").html(`<i class="cost">99</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' +
        ' за ' + 1 + ' шт.');

    range.on("change", function () {
        let itemsCost = this.value * 99;
        rangeText.val(this.value);
        $(".modal-cost").html(`<i class="cost">${itemsCost}</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' +
            ' за ' + this.value + ' шт.');
    });

    $(document).on('input change', '.buy-item-range', function () {
        let itemsCost = this.value * 99;
        $('#customRange3').val($(this).val());
        if (rangeText.val() === '') {
            range.val(1);
            $(".modal-cost").html(`<i class="cost">99</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' +
                ' за ' + 1 + ' шт.');
        } else {
            $(".modal-cost").html(`<i class="cost">${itemsCost}</i>` + ' <i class="fa-solid fa-coins modal-coins"></i>' +
                ' за ' + this.value + ' шт.');
        }
        if (rangeText.val() > 999) {
            rangeText.val(999);
        }

    });
});
