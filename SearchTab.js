$(document).ready(function() {
    console.log("mecanismo de busca carregado com sucesso");

    $('#txtBusca').keyup(function() {
    //envia para o php o valor do campo de busca
        var texto = $('#txtBusca').val();
        $.post("querySimp.php",{palavra:texto},function(data){
            $(".sugests").html(data);
        })
        console.log("valor de busca carregado com sucesso!");
    });

    //ao clicar na sugestão armazena ela no campo de selecionados
    $('.sugests').on('click','li',function(){
        $('.selecionados').append($(this));
    });

    //armazena os valores selecionados e envia por post para o php resultados.php
    $('#buscarCha').click(function(){
        var sintomas = [];
        $('.selecionados li').each(function(){
            sintomas.push($(this).text());
        });

        $().redirect('resultados.php',{
            'sintomas': sintomas
        });
    });



});
