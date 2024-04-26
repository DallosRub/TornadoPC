$('document').ready(function () {
    $('.kijel').click(function() {
        $.ajax({
            type: 'POST',
            data: { funkcio: 'k' },
            success: function () {
                window.location.href='index.php';
            },
            error: function (error) {
                alert('Hiba történt: ' + error);
            }
        });
    });
});