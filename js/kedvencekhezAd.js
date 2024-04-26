//kedvencekhez hozzaad
$(document).ready(function () {
    $('.kedvencekGomb').click(function () {
        var termekId = $(this).data('termek-id');

        $.ajax({
            type: 'POST',
            url: 'kedvencek_feldolgoz.php',
            data: { termek_id: termekId },
            success: function (response) {
                var valasz = JSON.parse(response);
                if (!valasz.success) {
                    alert(valasz.message);
                }
            },
            error: function (error) {
                console.error('Hiba történt:', error);
            }
        });
    });
});