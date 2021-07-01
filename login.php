<?php

$servername="localhost";
$username="root";
$password="";
$database="anurodh";

$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo "Connection could not be Made";
}
$login=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $sql="Select * from project where email='$email';";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if($num==1){
        while($row=mysqli_fetch_assoc($result)){
            if(password_verify($password,$row["password"])){
                $login=true;
                session_start();
                $_SESSION['loggedIn']=true;
                $_SESSION['username']=$email;
                header("location: myproject.php");
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylelogin.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li id='logo'>inote</li>
            <li> <a href="./login.php">Home</a>  </li>
            <li> <a href="./about.html">About</a> </li>
            <li> <a href="./services.html">Services</a> </li>
            <li> <a href="./contact.html"> Contact</a></li>
            <button id="signup" onclick="location.href='signup.php';">SignUp</button>
    </nav>
    <div class="section">
<h2 class="h1">Login Page</h2><br>
        <form action="login.php" method="post">
            <input type="email" name="email" id="email" placeholder="Enter your Email...." required><br><br>
            <input type="password" name="password" id="password" placeholder="Enter your password...." required><br><br>
            <input type="submit" value="Submit" id="btn1">

        </form>
        <?php
    if($login){
        echo "<p id='error' style='color:green; font-weight:bold; font-size:20px;'>Sucess....</p>";
    }
?>
    </div>
</body>
</html>