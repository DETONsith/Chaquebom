$(document).ready(function() {

    //index menu, Redirect to the pages
    
    send_to("#goto_busca", "RecipeSearch.html");
    send_to("#goto_suggest", "RecipeForm.html");
    send_to("#goto_feedback", "feedback.php");
    send_to("#goto_sobre", "sobre.php");



    function send_to(elemento,destination){
        $(elemento).click(function(){
            $(elemento).fadeOut();
            window.location.href = destination;
        });
    }

});