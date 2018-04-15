<!doctype html>
<html>
<head>
<title>View Users</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="style.css" rel="stylesheet">
</head>
<style>
    #msg{
        text-align: center;
        margin-top: 20px;
    }
</style>
<body>


<?php
include('connection.php');
session_start();
$user_id = $_POST['newadmin'];
$sql ="UPDATE users SET position = 'admin' WHERE user_id = $user_id";
$result = mysqli_query($link, $sql);
if($result){
    echo '<div id="msg" class="alert alert-success"><h1>New Admin Made Successfully!</h1></div>';
}
else{
    echo '<div id-"msg" class="alert alert-danger"><h1>Sorry!</h1><p>Unable to add admin.<p></p>Please try again later.</p></div>';
}
?>
    
    
    
    <script src="js/jquery-2.0.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>