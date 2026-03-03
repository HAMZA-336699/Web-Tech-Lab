<?php include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
$name=$_POST['name'];
$email=$_POST['email'];
$salary=$_POST['salary'];

$sql="INSERT INTO employees(name,email,salary)
VALUES('$name','$email','$salary')";

if(mysqli_query($conn,$sql)){
header("Location:index.php?status=success");
exit();
}else{
header("Location:index.php?status=error");
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Employee</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
background:linear-gradient(135deg,#1d3557,#457b9d);
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
}
.form-card{
background:white;
padding:40px;
border-radius:15px;
width:400px;
box-shadow:0 15px 30px rgba(0,0,0,0.2);
}
</style>
</head>

<body>

<div class="form-card">
<h3 class="text-center mb-4">Add Employee</h3>

<form method="POST">
<div class="mb-3">
<input type="text" name="name" class="form-control" placeholder="Full Name" required>
</div>

<div class="mb-3">
<input type="email" name="email" class="form-control" placeholder="Email" required>
</div>

<div class="mb-3">
<input type="number" name="salary" class="form-control" placeholder="Salary" required>
</div>

<button class="btn btn-success w-100">Save Employee</button>
</form>

</div>

</body>
</html>