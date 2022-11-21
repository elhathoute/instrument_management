$(document).ready(function(){
    $('#Signin').prop('disabled',true);
    //email signin  
     $("#email-login").keyup(function(){
        let email_login =  $(this).val();
        if(validateEmail(email_login)!==true){
            $(this).css('border','2px dashed red');
            $('#Signin').prop('disabled',true);
        }else{
            $(this).css('border','2px dashed green');
            $('#Signin').prop('disabled',false);
        }
        
     });
    //disabled button of signup
$('#SignUp').prop('disabled',true);
   //email signup
    $("#email").keyup(function(){
       
     var email = $("#email").val();
    //  console.log(validateEmail(email));
    //  console.log(email);
    if(returnValues()===0 ){
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
        email:email
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


//create function to verify email and password
function returnValues(){
   let email = $("#email").val();
   let confirmPass =$(passwordConfirm).val();
   let password =$("#password").val();
if(email === '' || confirmPass ==='' || password ==='' || email.length<11 || confirmPass.length<3 || password.length<3 || password!==confirmPass ||validateEmail(email)!==true  ){
    return 0;
}else{
    return 1;
}

}
//function to  validate email

function validateEmail(email)
{
    var regexEmail = /^[a-zA-Z0-9]+[-_.]?[a-zA-Z0-9]+[@]\w+[.]\w{2,3}$/;       //moha_ed@gmail(hotmail).com(ma/net)
    return regexEmail.test(email);                                       //if equal return true if not return false
}


// $("#search-instrument").keyup(function(){
  
//     console.log($("#search-instrument").val());

// });

});//close jquey ready

