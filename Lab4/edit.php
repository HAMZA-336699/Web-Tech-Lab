<?php
include 'config.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM employees WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    mysqli_query($conn, "UPDATE employees 
                         SET name='$name', email='$email', position='$position', salary='$salary'
                         WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>

<h2>Edit Employee</h2>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $row['name'] ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= $row['email'] ?>" required><br><br>
    Position: <input type="text" name="position" value="<?= $row['position'] ?>" required><br><br>
    Salary: <input type="number" name="salary" value="<?= $row['salary'] ?>" step="0.01" required><br><br>

    <button type="submit" name="update">Update</button>
</form>

</body>
</html>