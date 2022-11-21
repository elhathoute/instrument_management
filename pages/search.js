$("#search-user").keyup(function(){
  
    var searchUser = $(this).val();
      $.ajax({
         "url"    : "../users/searchUsers.php",
         "method" : "POST",
         "data"   :{
            searchUser:searchUser
         },
         success: function(result) {
        
            $('#users').html(result);
    
        },
    
        error : function (error){
            ("#users").html("il ya une error"+error);
    
        },
        beforeSend: function() {
            $("#users").html('<img src="../pages/img/charg9.gif" style="height:160px;width:160px;margin-left:30%;">');
        }

      });

});