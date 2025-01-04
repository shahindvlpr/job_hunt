$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "resultdata.php",
        dataType: "html",
        success: function (data) {
            $("#data").html(data);

        }
    });
});