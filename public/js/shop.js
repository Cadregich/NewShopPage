$( document ).ready(function() {
    $('.low-screen-width-balance').hide();
    if ($( document ).width() < 850) {
        $('.normal-screen-balance-block').hide();
        $('.low-screen-width-balance').show();
        $('.search-end-filter').css('justify-content', 'center');
    }
});
