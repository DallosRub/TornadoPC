$("document").ready(function () {
    $('.nov').click(function() {
        var id = $(this).attr("value");
        $.ajax({
            url: 'kosar.php',
            type: 'POST',
            data: { kosar_id: id, funkcio: 'n' },
            success: function () {
                //$(".tablazat").load(location.href + " .tablazat");
                window.location.reload();
            },
            error: function (error) {
                alert('Hiba történt: ' + error);
            }
        });
    });
});
