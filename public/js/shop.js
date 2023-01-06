$( document ).ready(function() {
    //alert ($( document ).width());
    $('.low-screen-width-balance').hide();
    if ($( document ).width() < 1000) {
        $('.normal-screen-balance-block').hide();
        $('.low-screen-width-balance').show();
        $('.search-end-filter').css('justify-content', 'center');
    }
});
