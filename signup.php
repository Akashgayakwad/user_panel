<?php
    session_start();
    include('connection.php');
    $missingUsername='<p><small>Please enter a username!</small></p>';
    $missingEmail='<p><small>Please enter your email address!</small></p>';
    $InvalidEmail='<p><small><small>lease enter a valid email address!</small></p>';
    $InvalidPassword='<p><small>Your password should be atleast 6 characters long and include one capital letter and one number!</small></p>';
    $missingPassword='<p><small>Please enter a password!</small></p>';
    $differentPassword='<p><small>Passwords don\'t match!</small></p>';
    $differentPassword2='<p><small>Please confirm your password</small></p>';
    $errors='';
    $username='';
    $email='';
    $password='';

    if(empty($_POST["username"])){
        $errors .= $missingUsername;
    }else{
        $username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
    }

    if(empty($_POST["email"])){
        $errors .= $missingEmail;
    }else{
        $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $errors .= $InvalidEmail;
        }
    }

    if(empty($_POST["password"]))
    {
        $errors .= $missingPassword;
    }
    elseif(!((strlen($_POST["password"])>6) and preg_match('/[A-Z]/',$_POST["password"]) and preg_match('/[0-9]/',$_POST["password"])))
    {
    $errors .= $InvalidPassword;
    }

    else{
        $password = filter_var($_POST["password"],FILTER_SANITIZE_STRING);

        if(empty($_POST["password2"]))
        {
            $errors .= $differentPassword2;  
        }else{
            $password2 = filter_var($_POST["password2"],FILTER_SANITIZE_STRING);
                if($password !== $password2)
                {
                    $errors .= $differentPassword;
                }
            }
        }

    if($errors)
    {
        $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
        echo $resultMessage;
        exit;
    }



    $username = mysqli_real_escape_string($link,$username);
    $email = mysqli_real_escape_string($link,$email);
    $password = mysqli_real_escape_string($link,$password);
    //$password = md5($password);
    $password = hash('sha256', $password);
    $sql ="SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>';
        echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
        exit;
    }
    $results = mysqli_num_rows($result);
    if($results){
        echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';
        //echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
        exit;
    }   


    $sql ="SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query!</div>';
        exit;
    }
    $results = mysqli_num_rows($result);
    if($results){
        echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';
        exit;
    }


    $sql ="INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
    $result = mysqli_query($link, $sql);
        if($result){
            echo "<div class='alert alert-success'><strong><h2>User Registered</h2><p>Thankyou!For registering with us. Kindly Log In!</p></div>";
        }

        else{
        echo '<div class="alert alert-danger">There was an error inserting the user details in the database!</div>';
        exit;
    }
?>