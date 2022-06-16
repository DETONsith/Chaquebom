$(document).ready(function() {

    $('#trylogin').click(function() {
    
        var email = $('#email').val();
        var password = $('#password').val();
        $.post("validation.php",{email:email,password:password});
    
    });



});