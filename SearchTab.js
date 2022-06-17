$(document).ready(function() {

    $('#txtBusca').keyup(function() {
        console.log("chegou aqui");
        var texto = $('#txtBusca').val();
        console.log($('#txtBusca').val());
        $.post("querySimp.php",{palavra:texto},function(data){
            $(".sugests").html(data);
        })

    });



});
