$(document).ready(function() {
    console.log("chegou aqui1");
    $( "#txtBusca" ).keyup(function() {
  alert( "digitou" );
});

    $('#txtBusca').keyup(function() {
        console.log("chegou aqui");
        var texto = $('#txtBusca').val();
        console.log($('#txtBusca').val());
        $.post("querySimp.php",{palavra:texto},function(data){
            $(".sugests").html(data);
        })

    });



});
