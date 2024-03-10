$("document").ready(function () {
    $(document).on("click", ".nov", function (event) {
        event.preventDefault();
        var id = $(this).attr("value");
        $.ajax({
            url: 'kosar.php',
            type: 'POST',
            data: { kosar_id: id, funkcio: 'n' },
            success: function (data) {
                $(".kosar_tablazat").load(location.href + " .kosar_tablazat");
            },
            error: function (xhr, status, error) {
                alert('Hiba történt: ' + error);
            }
        });
    });
});
