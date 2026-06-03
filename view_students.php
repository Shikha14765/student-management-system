<?php
include("db.php");

if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = mysqli_real_escape_string($conn,$_GET['search']);

    $result = mysqli_query($conn,
    "SELECT * FROM students
    WHERE name LIKE '%$search%'
    OR roll_no LIKE '%$search%'
    OR course LIKE '%$search%'");
}
else
{
    $result = mysqli_query($conn,
    "SELECT * FROM students");
}
?>

<!DOCTYPE html>

<html>
<head>

<title>Student Records</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:linear-gradient(135deg,#667eea,#764ba2);
min-height:100vh;
}

.card{
border:none;
border-radius:20px;
}

.table{
background:white;
}

.student-photo{
width:60px;
height:60px;
border-radius:50%;
object-fit:cover;
border:3px solid #0d6efd;
}

.title{
font-weight:bold;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark shadow">

<div class="container">

<span class="navbar-brand fs-4">
🎓 Student Records
</span>

<a href="dashboard.php"
class="btn btn-light">

🏠 Dashboard

</a>

</div>

</nav>

<div class="container mt-4">

<div class="card shadow-lg">

<div class="card-header bg-primary text-white">

<h3 class="title">
👨‍🎓 Student Management
</h3>

</div>

<div class="card-body">

<form method="GET">

<div class="row">

<div class="col-md-10">

<input
type="text"
name="search"
class="form-control"
placeholder="🔍 Search by Name, Roll No, Course"
value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

</div>

<div class="col-md-2">

<button
type="submit"
class="btn btn-primary w-100">

Search

</button>

</div>

</div>

</form>

<hr>

<div class="table-responsive">

<table class="table table-hover table-bordered align-middle">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Photo</th>
<th>Roll No</th>
<th>Name</th>
<th>Course</th>
<th>Branch</th>
<th>Year</th>
<th>Email</th>
<th>Phone</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result) > 0)
{
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>

<?php
if(!empty($row['photo']))
{
?>

<img
src="uploads/<?php echo $row['photo']; ?>"
class="student-photo">

<?php
}
else
{
echo "No Photo";
}
?>

</td>

<td><?php echo $row['roll_no']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['course']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td><?php echo $row['year']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td>

<a
href="edit_student.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">

✏ Edit

</a>

<a
href="delete_student.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this student?')">

🗑 Delete

</a>

</td>

</tr>

<?php
}
}
else
{
?>

<tr>

<td colspan="10" class="text-center text-danger">

No Student Found

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

</div>

</div>

</body>
</html>
