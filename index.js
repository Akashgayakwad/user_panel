$("#signupform").submit(function(event){ 
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#signupmessage").html(data);
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});



("#loginform").submit(function(event){ 
    event.preventDefault();
    var datatopost1 = $(this).serializeArray();
    console.log(datatopost1);
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost1,
        success: function(data){
            if(data == "successadmin"){
                window.location = "admin.php";
            }
            else if(data == "successmember"){
                window.location = "member.php";
            }
            else{
                $('#loginmessage').html(data);
            }
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});