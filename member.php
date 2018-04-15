<!doctype html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome Admin</title>   
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet">
    <style>
        #container{
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div id="container" class="container-fluid">
    <?php
session_start();
include("connection.php");
if($_SESSION)
  { $user_id=$_SESSION['user_id']; 
    $sql = "SELECT * FROM users WHERE user_id= $user_id";
    $result = mysqli_query($link, $sql);
        if(!$result){
            echo '<div class="alert alert-danger">Error running the query!</div>';
            exit;
        }
    else {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo '<marquee behavior="slide" width="60%" hspace="35%" scrollamount="20px"><h1>Welcome to MEMBER Panel!</h1></marquee>';
        echo      "
        <div class='row'>
            <div class='col-md-offset-3 col-md-6'>
                <h2 id='tableheading'>General Account Settings:</h2>
                <div class='table-responsive'>
                    <table id='settingstable' class='table table-bordered table-hover'>
                        <tr>
                            <td>User ID</td>
                            <td>" . $row['user_id'] . "</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>" . $row['username'] . "</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>" . $row['email'] . "</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>" . $row['password'] . "</td>
                        </tr>
                    </table>
                </div>     
            </div>
        </div>";
                    
    }
   echo "<center>
    <form action='logout.php'>
    <button class='btn btn-info btn-lg' type='submit'>Log Out</button>
    </form>
    </center>";
  }
    else{
        echo '<div class="alert alert-danger"><center><h1>SORRY! SESSION timed out.</h1></center></div>';
    }
?> 
</div>
</body>
    <script src="js/jquery-2.0.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</html>