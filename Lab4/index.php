<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
</head>
<body>

<h2>Employees</h2>
<a href="create.php">Add New Employee</a>
<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Position</th>
    <th>Salary</th>
    <th>Action</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM employees");

while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['position'] ?></td>
    <td><?= $row['salary'] ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this record?')">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>