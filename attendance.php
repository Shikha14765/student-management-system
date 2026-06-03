


<?php
include("db.php");

if(isset($_GET['id']) && isset($_GET['status']))
{
    $student_id = $_GET['id'];
    $status = $_GET['status'];

    $date = date("Y-m-d");

    mysqli_query($conn,
    "INSERT INTO attendance
    (student_id,attendance_date,status)
    VALUES
    ('$student_id','$date','$status')");

    echo "<script>
    alert('Attendance Saved Successfully');
    window.location='attendance.php';
    </script>";
}

$result = mysqli_query($conn,"SELECT * FROM students");
?>

<!DOCTYPE html>

<html>
<head>

<title>Attendance Management</title>

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

.navbar{
box-shadow:0 4px 10px rgba(0,0,0,0.3);
}

.student-row:hover{
background:#f5f5f5;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<span class="navbar-brand fs-4">
📅 Attendance Management
</span>

<a href="dashboard.php"
class="btn btn-light">

🏠 Dashboard

</a>

</div>

</nav>

<div class="container mt-5">

<div class="card shadow-lg">

<div class="card-header bg-success text-white">

<h3>
✅ Mark Student Attendance
</h3>

</div>

<div class="card-body">

<div class="alert alert-info">

<b>Today's Date:</b>

<?php echo date("d-m-Y"); ?>

</div>

<div class="table-responsive">

<table class="table table-hover table-bordered align-middle">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Roll No</th>
<th>Student Name</th>
<th>Attendance Action</th>

</tr>

</thead>

<tbody>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr class="student-row">

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['roll_no']; ?></td>

<td>
<strong>
<?php echo $row['name']; ?>
</strong>
</td>

<td>

<a
href="attendance.php?id=<?php echo $row['id']; ?>&status=Present"
class="btn btn-success">

✔ Present

</a>

<a
href="attendance.php?id=<?php echo $row['id']; ?>&status=Absent"
class="btn btn-danger">

✘ Absent

</a>

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
