$(document).ready(function() {
    $('.kosarGomb').click(function() {
        var termekId = $(this).data('termek-id');
        var termekMenny;

        if ($('#menny').val() < 1 || typeof($('#menny').val()) === "undefined") {
            termekMenny = 1;
        } else if (typeof($('#menny').val()) !== "undefined") {
            if ($('#menny').val() > 99) {
                termekMenny = 99;
            } else {
                termekMenny = $('#menny').val();
            }
        }

        $.ajax({
            type: 'POST',
            url: 'kosar_feldolgoz.php',
            data: { termek_id: termekId, termek_menny: termekMenny },
            success: function(response) {
                var valasz = JSON.parse(response);
                if (!valasz.success) {
                    alert(valasz.message);
                }
            },
            error: function(error) {
                alert('Hiba történt: ' + error);
            }
        });
    });
});
