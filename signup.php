<?php

$servername="localhost";
$username="root";
$password="";
$database="anurodh";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo "Connection could not be Made";
}
$sucess=false;
$verify=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $sql1="Select * from project where email='$email';";
    $check=mysqli_query($conn,$sql1);
    $num=mysqli_num_rows($check);
    if($num<1){
    $pass=password_hash($password,PASSWORD_DEFAULT);
    $sql="INSERT INTO `project` (`email`, `password`) VALUES ('$email', '$pass');";
    $result=mysqli_query($conn,$sql);
    if($result){
        $sucess=true;
    }
    else{
        $sucess=false;  
    }
    $verify=false;
}
else{
    $verify=true;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li> <a href="./login.php">Home</a>  </li>
            <li> <a href="">About</a> </li>
            <li> <a href="">Services</a> </li>
            <li> <a href=""> Contact</a></li>
            <button id="signup" onclick="location.href='login.php';">Login</button>
    </nav>
    <div class="section">
<h2 class="h1">SignUp Page</h2><br>
        <form action="signup.php" method="post">
            <input type="email" name="email" id="email" placeholder="Enter your Email...." required><br><br>
            <input type="password" name="password" id="password" placeholder="Enter your password...." required><br><br>
            <input type="submit" value="Submit" id="btn1">
        </form>
        <?php
           if($sucess){
               echo "<p id='error'style='color: green;font-weight: bold;font-size: 20px;'>You have been registered Sucessfully.</p>";
           }
           if($verify){
               echo "<p id='error' style='color: red;font-weight: bold;font-size: 20px;'>This is already registered.</p>";
           }
?>
        </div>  
       
   
</body>
</html>