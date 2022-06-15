$(document).ready(function() {

    $('#txtBusca').keyup(function() {

        var texto = $('#txtBusca').val();
        $.post("querySimp.php",{palavra:texto},function(data){
            $(".sugests").html(data);
        })

    });



});