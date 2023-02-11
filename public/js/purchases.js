$(document).ready(function () {
    let loadMoreButton = $('#load-more-button');

    let offset = 30;
    let limit = 30;


    loadMoreButton.click(function () {
        $.ajax({
            url: '/shop/get-more-items',
            method: 'GET',
            data: {
                offset: offset,
                limit: limit
            },
            success: function (data) {

                let purchasesCount = loadMoreButton.attr('purchasesCount');

                let tbody = $('#purchases-table-body');
                data['purchases'].forEach(function (purchase, index) {
                    let tr = $('<tr>');

                    tr.append(
                        $('<th>').text((index + 1) + offset),
                        $('<th>').text(purchase.goods_name + ' (' + purchase.goods_count + ')'),
                        $('<th>').text(new Date(purchase.created_at).toLocaleString()),
                        $('<th>').text(purchase.purchase_price)
                    );
                    tbody.append(tr);
                });

                offset += limit;

                if (offset >= purchasesCount) {
                    $('#load-more-button').hide();
                }
            }
        });
    });
});
