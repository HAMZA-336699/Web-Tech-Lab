<?php
include 'db.php';
$id=$_GET['id'];

if(mysqli_query($conn,"DELETE FROM employees WHERE id=$id")){
header("Location:index.php?status=success");
}else{
header("Location:index.php?status=error");
}
?>