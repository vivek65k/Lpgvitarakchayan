 
<?php 
include('db/config.php');
$error="";
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/login.css">
  <title>Login</title>
</head>
<body>
  <form method="post" class="form" id="box">
    <h1 style="text-align:center;">Login</h1>
    <div><?php echo $error; ?></div>
    <label for="username"  class="labels">Username:</label>
    <input id="text" type="text" class="username inputs" name="user_name" placeholder="Username..." required>
    
    
    
    <label for="password" class="labels">Password</label>
    <input id="text" type="password" class="inputs" name="password" placeholder="Password..." required>
 
    <input id="button" name="submit" type="submit" value="Login">
    <hr>
    <div class="other">
    <a href="https://lyteriddle.com/">Need support?</a>
    </div>
  </form>
  
</body>
</html>

<?php 
session_start();

if (isset($_POST['submit'])) {
 
 $username = $_POST['user_name'];
  $password = md5($_POST['password']);
echo $link;
 $sql= "select * from admin where username ='".$username."' and password= '".$password."'";
if($query=mysqli_query($conn,$sql)){

    $row = mysqli_num_rows($query);

  if($row>0){
    $_SESSION['username']= $username;
    // echo "<script> window.location.href = '".dirname($link)."/home.php';</script>";
    echo "<script> window.location.href = '".$link."home.php';</script>";
  }else{
  echo "<script> alert('Username and password combination worng !')</script>";
  }
}else{

  echo "<script> alert('Username and password combination worng !')</script>";
}

}


 ?>