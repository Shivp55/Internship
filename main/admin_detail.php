<?php
$id=$_SESSION['login_id'];
$sql="SELECT * FROM admin WHERE id=$id";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $name=$row['name'];
    $email=$row['email'];
    $password=$row['password'];
    $uname=$row['username'];
  }
}

?>
