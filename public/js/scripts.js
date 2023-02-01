$(document).ready(function () {
    $( "#mod-select-text" ).change(function() {
        $('#mod-selected').val($(this).val());
    });
});
