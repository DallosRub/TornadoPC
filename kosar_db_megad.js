$(document).ready(function(){
    $('.nav-link.btn').click(function(event){
        event.preventDefault();
        $.ajax({
            url: 'fuggvenyek.php',
            dataType: 'json',
            success: function(response) {
                $("#kosarDarabszam").text(response.db);
            },
            error: function(xhr, status, error) {
                console.error('Hiba történt a kéréskor: ' + error);
            }
        });
    });
});
