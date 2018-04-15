<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=screen-width intial-scale=1.0 user-scalable=yes">
    <title>Login/Signup</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="style.css" rel="stylesheet">
</head>
<style>
    .jumbotron{
        border-radius: 15px;
    }    
    #loginjumbo{
        height: ;
    }
    
</style>
    
<body>
<!--header-->
    <center>
    <h1 class="header">Welcome to the page.</h1>
    <marquee><h3 class="header">We hope that you will have a great experience!</h3></marquee>
    </center>
    <div class="row">
            <!--Login Form-->
    <div class="jumbotron col-md-offset-1 col-md-4" id="loginjumbo">
        <h3>Already have an account? Login</h3>
        <form method="post" id="loginform">
                 <div id="loginmessage"></div>
                 <div class="form-group">
                      <label for="loginemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="loginpassword" class="sr-only">Password</label>
                      <input class="form-control" type="password" name="loginpassword" id="loginpassword" placeholder="Password" maxlength="30">
                    </div> 
                <input class="btn btn-success" name="login" type="submit" value="Log In">
                <br><br><br><br><br><br>
        </form>
    </div>
    <!--Signup Form-->
    <div class="jumbotron col-md-offset-1 col-md-4" id="signupjumbo">
        <h3>Don't have an acount? Sign-up Now!</h3>
        <form method="post" id="signupform">
                <div id="signupmessage"></div>
                <div class="form-group">
                      <label for="username" class="sr-only">Username:</label>
                      <input class="form-control" type="text" name="username" id="username" placeholder="Username" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="email" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" maxlength="50">
                  </div>
                  <div class="form-group">
                      <label for="password" class="sr-only">Choose a password:</label>
                      <input class="form-control" type="password" name="password" id="password" placeholder="Choose a password" maxlength="30">
                  </div>
                  <div class="form-group">
                      <label for="password2" class="sr-only">Confirm password</label>
                      <input class="form-control" type="password" name="password2" id="password2" placeholder="Confirm password" maxlength="30">
                  </div>
                <input class="btn btn-success" name="signup" type="submit" value="Sign Up">
        
        </form>
    </div>
    </div>

    <script src="js/jquery-2.0.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="index.js"></script>
</body>
 

</html>