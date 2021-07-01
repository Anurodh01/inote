<?php

$login=false;
session_start();
if(isset($_SESSION['loggedIn']) || $_SESSION['loggedIn']==true){
    $login=true;
}
else{
    header("location: login.php");
}


?>

<?php

$servername="localhost";
$username="root";
$password="";
$database="anurodh";

$conn=mysqli_connect($servername,$username,$password,$database);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title=$_POST['title'];
    $discription=$_POST['textarea'];
    $email=$_SESSION['username'];
    $sql="INSERT INTO `notes` (`email`, `title`, `discription`) VALUES ('$email', '$title', '$discription');";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "Inserted.";
    }
    else{
        echo "not done.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD operations</title>
    <link rel="stylesheet" href="style.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#li').click(function(){
                let x=confirm("Do you want to logout?");
                if(x){  
                      var Backlen=history.length;   
                    history.go(-Backlen);  
                    window.location.href="logout.php"; 
                }
              });
              
        });
       
    </script>
    
    <style>
        .accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
}
.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}
.active:after {
  content: "\2212";
}


/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .accordion:hover {
  background-color: #ccc;
}

/* Style the accordion panel. Note: hidden by default */
.panel {
  padding: 0 18px;
  background-color: white;
  display: none;
  overflow: auto;
  width: 100%;
  text-align:left;
}
.panel p{
    padding:20px;
}
.note{
    overflow:auto;
}
#li{
    cursor: pointer;
    color:Red;
    padding:8px;
    border-radius:8px;
    background-color:grey;
    border:2px solid black;
}
#a{
  color:orange;
}
#a:hover{
  color:pink;
}
#d{
  color:red;
}
#d:hover{
  color:pink;
}
    </style>
</head>
<body>
    <nav class="navbar">
        <ul>
            <li> <a href="">Home</a>  </li>
            <li> <a href="about.html">About</a> </li>
            <li> <a href="services.html">Services</a> </li>
            <li> <a href="contact.html"> Contact</a></li>   
        
            <li style='color:green; text-align:center;padding:10px;margin-left:420px; background-color:pink;width:300px; border-box:fixed;font-weight:bold; border-radius:8px;'><?php  
        
        echo $_SESSION['username'];
        ?></li> 
           <button id="li">Logout</button>   
        </ul>   
     </nav>

   <div class="sec">
       <h2 class="h1">Add a Note</h2><br>
       <form action="myproject.php" method="POST">
          <input type="text" id="title" name="title" placeholder="Enter the title...." required><br><br>
          <textarea name="textarea" id="textarea" cols="30" rows="6" placeholder="Enter the discription...." required></textarea><br><br>
          <input type="submit" value="Add Note" id="btn">
       </form>
   </div>
 <div class="sec2">
     <div class="note">
  <?php

$servername="localhost";
$username="root";
$password="";
$database="anurodh";
$email=$_SESSION['username'];
$conn=mysqli_connect($servername,$username,$password,$database);
$sql="Select * from notes where email='$email';";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
echo "<h2 style='text-align:center;'>Notes</h2><br>";
while($row=mysqli_fetch_assoc($result)){
    echo "<button class='accordion'>".$row['title']."</button>";
    echo "<div class='panel'><p>".$row['discription']."</p>
    </div>";
    $str=$row['sno'];
    echo "<a href='edit.php?sno=$str' id='a'>Edit</a> &nbsp &nbsp";
    echo "<a href='delete.php?sno=$str' id='d'>Delete</a>";
}


    
    ?>
 </div>
 </div>



   <script>

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
    </script>

</body>
</html>