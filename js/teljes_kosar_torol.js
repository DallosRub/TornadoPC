$('.teljes_kosar_torol').click(function() {
    $.ajax({
        type: "POST",
        url: "kosar.php",
        data: { funkcio: "teljes_kosar_torol" },
        beforeSend: function() {
            return confirm("Biztosan törölni szeretné a kosár tartalmát?");
        }
    }).done(function() {
        //$(".tablazat").load(location.href + " .tablazat");
        window.location.reload();
    });
});