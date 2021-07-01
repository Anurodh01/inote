<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <script>
    let x=false;
    x=confirm("Do you want to delete this note?");
    if(x){
        <?php
$servername="localhost";
$username="root";
$password="";
$database="anurodh";
$conn=mysqli_connect($servername,$username,$password,$database);
$sno=$_GET['sno'];
$sql="Delete from notes where sno='$sno';";
$result=mysqli_query($conn,$sql);
echo var_dump($result); 
if($result){
    header("location: myproject.php");
    // echo "<p style='background-color:green(0,255,0,0.5);border:2px solid yellow;'> Note has been deleted sucessfully.</p>";
}
else{
    echo "not deleted;";
}
?>
    }
    </script>
</head>
<body>
<p>Go Back To...... <a href="myproject.php">Home</a></p>

</body>
</html>








