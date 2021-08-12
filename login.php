<?php
$showAlert = false;
$showError=false;
 include 'server.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $username=$_POST["username"];
  $password1=$_POST["password1"];
  $password2=$_POST["password2"];
  //$exists=false;


  //check whether this username exists
  $existssql= "SELECT * FROM user_view WHERE username= '$username'";
  $result=mysqli_query($mysqli,$existssql);
  $numExistRows = mysqli_num_rows ($result);

  //ill check if exists are not
  if($numExistRows > 0){
    $exists=true;
    $alert1="<script>alert('USERNAME IS PRESENT');</script>";
    echo $alert1;
   
  }else{
    $exists=false;
  }
  if((ctype_alnum($username)) && (strlen($username)>=6) && (strlen($username)<=12))
  {
   //isPasswordValid($password1);
   $str = preg_match( '@^(?=.*[0-9])(?=.*[!%^&*])[a-zA-Z0-9!%^&*]{6,16}@',$password1);
   
  
 if(!$str)
 {
  $alert3 ="<script>alert('THE PASSWORD SHOULD CONTAIN ATLEAST ONE ALPHABET NUMERIC SPECIAL CHARACTER AND MINIMUM LENGTH OF 6');</script>";
  echo $alert3;
  
  
 }
   if(($password1 == $password2) && ($exists == false) && ($str==TRUE))
  {
    $sql="INSERT INTO user_view ( `username`, `password`) VALUES ( '$username','$password1')";
   $result=mysqli_query($mysqli,$sql);


   if($result){
    $alert2="<script>alert('SUCCESFULLY LOGGED IN');</script>";
    echo $alert2;
   }

  }else{
   echo'<script>alert("PASSWORDS ARE NOT MATCHING");</script>';
   
  }
 }else{
   echo'<script>alert("Username should be alphanumeric and the length should be between 6 to 12")</script>';
   
  }
 /* function isPasswordValid($password1){
 $str = preg_match('/^[/ A-Za-z0-9_@.\/#&+-/]*$/',$password1);
 if(!$str && strlen($password1<6))
 {
  echo'<script>alert("THE PASSWORD SHOULD CONTAIN ALPHABETS NUMERIC SPECIAL CHARACTER AND MINIMUM LENGTH OF 6")</script>';
  
 }
 }*/
}


?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- background link -->
    

    <title>INTERNSHALA</title>
  </head>
  <body class= "text-white bg-dark">
  
  
<div class="container"  >
  <h1 class="text-center"  >INTERNSHALA LOGIN PAGE</h1>
</div> 
<div class="container col-md-6">
  <form action="login.php" method="post">
    <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required> 
    
  <div class="form-group">
    <label for="password1">Password</label>
    <input type="password" name="password1" class="form-control" id="password1" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="password2">confirm Password</label>
    <input type="password" name="password2" class="form-control" id="password2" placeholder="Password" required>
    <small id="emailHelp" class="form-text text-muted">make sure to write correct password.</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
</div>

















   
  </body>
</html>