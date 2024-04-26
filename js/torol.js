$("document").ready(function () {
    $('.torol').click(function() {
        var id = $(this).attr("value");
        $.ajax({
            //url: 'kosar.php',            // kosar-->kedvencek
            type: 'POST',
            data: { kosar_id: id, funkcio: 't' },
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