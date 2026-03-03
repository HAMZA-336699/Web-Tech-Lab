<?php include 'db.php'; ?>

<?php
$result = mysqli_query($conn,"SELECT * FROM employees");
$total = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Employee Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body{
    background: linear-gradient(135deg,#1d3557,#457b9d);
    min-height:100vh;
    color:white;
}
.main-card{
    background:white;
    color:black;
    border-radius:15px;
    padding:30px;
    box-shadow:0 15px 30px rgba(0,0,0,0.2);
}
.btn{
    border-radius:30px;
}
.dashboard-card{
    background:linear-gradient(135deg,#2ecc71,#27ae60);
    border-radius:15px;
    padding:20px;
    text-align:center;
    color:white;
}
</style>
</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">Employee Management System</h2>

<div class="row mb-4">
<div class="col-md-4">
<div class="dashboard-card">
<h5>Total Employees</h5>
<h2><?= $total ?></h2>
</div>
</div>
</div>

<div class="main-card">

<div class="d-flex justify-content-between mb-3">
<h4>Employee Records</h4>
<a href="create.php" class="btn btn-success px-4">+ Add Employee</a>
</div>

<table class="table table-hover text-center align-middle">
<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Salary</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td><?= $row['email'] ?></td>
<td>$<?= $row['salary'] ?></td>
<td>
<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="delete.php?id=<?= $row['id'] ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this employee?')">Delete</a>
</td>
</tr>
<?php } ?>

</tbody>
</table>
</div>
</div>

<?php
if(isset($_GET['status'])){
if($_GET['status']=="success"){
echo "<script>
Swal.fire({
icon:'success',
title:'Success!',
text:'Operation completed successfully',
timer:1500,
showConfirmButton:false
});
</script>";
}else{
echo "<script>
Swal.fire({
icon:'error',
title:'Error!',
text:'Something went wrong'
});
</script>";
}
}
?>

</body>
</html>