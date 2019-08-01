$(document).ready(function () {
    $('input[type="file"]').on('change', function() {
        let val = $(this).val();
        $('.file-name').text(val);
    });
});
