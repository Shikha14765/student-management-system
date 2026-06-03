<?php
include("db.php");

$result = mysqli_query($conn,
"SELECT attendance.*, students.name
FROM attendance
INNER JOIN students
ON attendance.student_id = students.id
ORDER BY attendance.id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Attendance Report</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container mt-4">

<h2>Attendance Report</h2>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Student Name</th>
<th>Date</th>
<th>Status</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['attendance_date']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>