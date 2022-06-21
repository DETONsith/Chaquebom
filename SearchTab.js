$(document).ready(function() {

    var sintomas = [];

    console.log("mecanismo de busca carregado com sucesso");

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
        
        $('.selecionados li').each(function(){
            sintomas.push($(this).text());
        });

        var sintomas_send = sintomas.join(",");
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
