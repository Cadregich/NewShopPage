$(document).ready(function () {
    let loadMoreButton = $('#load-more-button');

    let offset = 0;
    let limit = 30;

    function getItems() {
        $.ajax({
            url: '/shop/get-more-items',
            method: 'GET',
            data: {
                offset: offset,
                limit: limit
            },
            success: function (data) {


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
                let purchasesCount = data['purchasesCount'];
                offset += limit;
                console.log(purchasesCount);
                if (offset < purchasesCount) {
                    loadMoreButton.show();
                } else {
                    loadMoreButton.hide();
                }
            }
        });
    }
    getItems();

    loadMoreButton.click(function () {
        getItems();
    });
});
