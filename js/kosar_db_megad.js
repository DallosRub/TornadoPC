$('.kosarGomb').click(function() {
    var db_span = $('.friss').attr("value");
    $.ajax({
        type: "POST",
        //url: "termekek.php",
        success: function(response) {
            $('.friss').text(db_span);
            window.location.reload();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});