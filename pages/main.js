$(document).ready(function(){
    //disabled button of signup
$('#SignUp').prop('disabled',true);
   //email
    $("#email").keyup(function(){
       
    // var email = $("#email").val();
    if(returnValues()===0){
        $(this).css('border','2px dashed red');
        $('#SignUp').prop('disabled',true);
    }else{
        $(this).css('border','2px dashed green');
        $('#SignUp').prop('disabled',false);
    }
   $.ajax({
    "url": "searchEmailAjax.php",
    "method": "POST",
    "data": {
        email: email
    },
    success: function(result) {
        
        $('.error-email').html(result);

    },

    error : function (error){
        (".error-email").html("il ya une error"+error);

    }

   });

});
$("#password").keyup(function(){
  
    if (returnValues()===0) {
        $('#password').css('border','2px dashed red');
        $('#SignUp').prop('disabled',true);
    } else {
        $('#password').css('border','2px dashed  green');
        $('#passwordConfirm').css('border','2px dashed  green');
        $('#email').css('border','2px dashed green');
        $('#SignUp').prop('disabled',false);
       
    }

});


$("#passwordConfirm").keyup(function(){
  
    if (returnValues()===0) {
        $('#passwordConfirm').css('border','2px dashed red');
        $('#SignUp').prop('disabled',true);
    } else {
        $('#passwordConfirm').css('border','2px dashed  green');
        $('#password').css('border','2px dashed  green');
        $('#email').css('border','2px dashed green');
        $('#SignUp').prop('disabled',false);
       
    }

});




function returnValues(){
   let email = $("#email").val();
   let confirmPass =$(passwordConfirm).val();
   let password =$("#password").val();
if(email === '' || confirmPass ==='' || password ==='' || email.length<11 || confirmPass.length<3 || password.length<3 || password!==confirmPass ){
    return 0;
}else{
    return 1;
}

}


});//close jquey ready
