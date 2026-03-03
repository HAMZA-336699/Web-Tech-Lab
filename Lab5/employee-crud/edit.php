<?php
include 'db.php';
$id=$_GET['id'];

$data=mysqli_query($conn,"SELECT * FROM employees WHERE id=$id");
$row=mysqli_fetch_assoc($data);

if($_SERVER["REQUEST_METHOD"]=="POST"){
$name=$_POST['name'];
$email=$_POST['email'];
$salary=$_POST['salary'];

$sql="UPDATE employees SET
name='$name',
email='$email',
salary='$salary'
WHERE id=$id";

if(mysqli_query($conn,$sql)){
header("Location:index.php?status=success");
exit();
}else{
header("Location:index.php?status=error");
}
}
?>