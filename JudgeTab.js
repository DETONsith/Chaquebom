$(document).ready(function(){

    $("#aprovar").click(function(){
        var iditem = $(this).attr("iditem");
        document.forms[String(iditem)].attr("action") = "aprovar.php";
        document.forms[String(iditem)].submit();
        
    })

    $("#reprovar").click(function(){
        var iditem = $(this).attr("iditem");
        document.forms[String(iditem)].attr("action") = "reprovar.php";
        document.forms[String(iditem)].submit();
        
    })



})