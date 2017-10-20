$(document).ready(function(){
    $("#submit").click(function(){
      var message = '';
      if($.trim($('#name').val()) == ''){
        message += " Name";
        //$("#name-label").addClass("glyphicon glyphicon-star");
        $("#name").addClass("alert-danger");
      }
      if($.trim($('#email').val()) == ''){
        message += " Email";
        $("#email").addClass("alert-danger");
      }
      if($.trim($('#message').val()) == ''){
        message += " Message";
        $("#message").addClass("alert-danger");
      }
      if (message){
          $("#errors").addClass( "alert-danger contact");
          $("#errors").html("You have the following error(s): " + message + " cannot be blank." );
          //alert(message + ' cannot be blank');
          return false;
      }
    });
});
