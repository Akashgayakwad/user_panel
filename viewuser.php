<!doctype html>
<html>
<head>
<title>View Users</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="style.css" rel="stylesheet">
</head>
<style>
    td, th{
        text-align: center;
        font-size: 20px;
    } 
    th{
        text-decoration: underline;
        font-weight: 100;
    }
    button{
        margin: 5px 0px;
    }
</style>
<body>
<?php
include('connection.php');
session_start();
$sql= "SELECT * FROM users";
$result = mysqli_query($link, $sql);
if(!$result){
echo '<div class="alert alert-danger"><strong><p>Sorry!Unable to Fetch Users.</p></strong>
<p>Please try agian later.</p></div>';
}
else
{  
echo'<center><h1><strong>ALL USERS DETAILS</strong></h1></center>';

echo '<center>
       <table class="table table-bordered table-hover">
       <tr>
       <th><b>User Id</b></th>
       <th><b>User Name</b></th>
       <th><b>Email</b></th>
       <th><b>Admin/Member</b></th>
       </tr>';
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
    echo '<tr>';
    echo '<td>' . $row['user_id'] . '</td>';
    echo '<td>' . $row['username'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['position'] . '</td>';
    echo '</tr>';
}
echo '</table>
      </center>';
}   
    $sql= "SELECT user_id FROM users where user_id <>" . $_SESSION['user_id'];
    $result = mysqli_query($link, $sql);
    echo '<center><form class="form-control" action="newadmin.php" method="post">
     <label for="#newadmin">Selected the member for new admin</label>
     <select name="newadmin" class="form-control">';
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        echo'<option value="' . $row[user_id] . '">' . $row['user_id'] .'</option>';
    }
    echo '</select>
    <button type="submit" name="selectuser" value="selected" class="btn btn-lg btn-info">Make Admin</button>
          <form>
          </center>';
?>
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    </body>
</html>