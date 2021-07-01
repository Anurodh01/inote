
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
    *{
        margin:0;
    }
        body{
            background:url("./editcity.jpeg");
        }
        .h1{
            color:white;
        }
    .sec{
    display: flex;
    flex-direction:column ;
    align-items: center;
    justify-content: center;
    border: 2px solid grey;
    width: 600px;
    height: 500px;
    margin-top: 30px;
    margin-left: 330px;
    border-radius: 20px;
    padding: 30px;
    background: rgb(0, 0, 0); /* Fallback color */
    background: #15cde07a;/* Black background with 0.5 opacity */
        }
        #btn{
    width: 425px;
    padding: 10px;
    font-size: 15px;
    border: 2px solid rgba(136, 46, 36, 0.548);
    border-radius: 10px;
    color: black;
    background-color: rgb(255 184 102 / 73%);
}
.sec form input{
   width: 400px;
   padding: 10px;
   background-color: #ccc;
   border-radius: 10px;
   border: 2px solid black;
   color: rgb(0, 0, 0);
   font-size: 15px;
}
#textarea{
    width: 418px;border-radius: 10px;
    background-color: #ccc;
    border: 2px solid black;
    padding: 2px;
    font-size: 15px;
    color: rgb(0, 0, 0);
}
.edited{
    padding:10px;
    color:Green;
    background-color:rgb(0,255,0,0.4);
    border:2px solid yellow;
}
#nav{
    padding:10px;
    border:2px solid yellow;
    
}
    </style>
</head>
<body>
<p id="nav">
    GO BACK TO.... <a href="myproject.php">HOME</a>
</p>
<?php
    
$servername="localhost";
$username="root";
$password="";
$database="anurodh";

$conn=mysqli_connect($servername,$username,$password,$database);
$sno=$_GET['sno'];
$qry="Select * from notes where sno='$sno';";
$res=mysqli_query($conn,$qry);
$num=mysqli_num_rows($res);
$data=mysqli_fetch_array($res);
if(isset($_POST['update'])){
    $title=$_POST['title'];
    $discription=$_POST['textarea'];
    $sql="Update notes set title='$title',discription='$discription' where sno='$sno';";
    $result=mysqli_query($conn,$sql);
    if($result){
       echo "<p class='edited'> You have sucessfully edited the note!!!!</p>";
    }
    else{
        echo "not done.";
    }
}
    ?>
<div class="sec">
    <h2 class="h1">Edit the Note</h2><br>
    <form method="POST">
       <input type="text" id="title" name="title" placeholder="Enter the title...." value="<?php echo $data['title'] ?>" required><br><br>
       <textarea name="textarea" id="textarea" cols="30" rows="6" placeholder="Enter the discription...." required><?php echo $data['discription'] ?></textarea><br><br>
       <input type="submit" value="Edit Note" name="update" id="btn">
    </form>
</div>
    
</body>
</html>