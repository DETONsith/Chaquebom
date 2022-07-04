$(document).ready(function() {

    var sintomas = [];

    console.log("mecanismo de busca carregado com sucesso ;) ");

    $('#txtBusca').keyup(function() {
    //envia para o php o valor do campo de busca
        var texto = $('#txtBusca').val();
        if (texto != ""){
        $.post("querySimp.php",{palavra:texto},function(data){
            $(".sugests").html(data);
        })
        console.log("valor de busca carregado com sucesso!");
        }else{
            $('.sugests').html("");
        }   

    });

    //ao clicar na sugestão armazena ela no campo de selecionados
    $('.sugests').on('click','li',function(){
        if(sintomas.indexOf($(this).text()) == -1){
        $('.selecionados').append($(this));
        $('#txtBusca').val("");
        $('.sugests').html("");
        //check if the item is already in the array
        
            sintomas.push($(this).text());
        }
        console.log(sintomas);
    });

    //armazena os valores selecionados e envia por post para o php resultados.php
    $('#btnBusca').click(function(){
        console.log("clicou em enviar");
        
        $('.selecionados li').each(function(){
            sintomas.push($(this).text());
            
        });
        console.log("colocou os sintomas em um array");

        var sintomas_send = sintomas.join(",");
        console.log("Juntou os sintomas assim: "+sintomas_send);
        $('.sugest-name').html("<form method='post' hidden action='resultados.php' name='formparasintomas'><input type='text' name='sintomas' id='sintomas' value='"+sintomas_send+"'><input type='text' name='act_page' id='act_page' value='1'></form>");
        document.forms['formparasintomas'].submit();

        console.log("Enviou o form");
        $.post("resultados.php",{sintomas:sintomas_send});
        clearAll();
        
    });

    //ao clicar no selecionado remove ele do array e remove do campo de selecionados
    $('.selecionados').on('click','li',function(){
        $(this).remove();
        var index = sintomas.indexOf($(this).text());
        sintomas.splice(index,1);
        console.log(sintomas);
    });

    function clearAll(){
        $('.selecionados').html("");
        $('.sugests').html("");
        sintomas = [];
    }
});
