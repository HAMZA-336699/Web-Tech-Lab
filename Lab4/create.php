<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];

    mysqli_query($conn, "INSERT INTO employees (name, email, position, salary)
                         VALUES ('$name', '$email', '$position', '$salary')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>

<h2>Add Employee</h2>

<form method="POST">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Position: <input type="text" name="position" required><br><br>
    Salary: <input type="number" name="salary" step="0.01" required><br><br>

    <button type="submit" name="submit">Save</button>
</form>

</body>
</html>