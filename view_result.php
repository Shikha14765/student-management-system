<?php
include("db.php");

$result = mysqli_query($conn,
"SELECT results.*, students.name
FROM results
INNER JOIN students
ON results.student_id = students.id
ORDER BY results.id DESC");
?>

<!DOCTYPE html>

<html>
<head>

<title>Result Report</title>

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

.navbar{
box-shadow:0 4px 10px rgba(0,0,0,0.3);
}

.table{
background:white;
}

.result-row:hover{
background:#f5f5f5;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<span class="navbar-brand fs-4">
🏆 Result Management
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
📄 Student Result Report
</h3>

</div>

<div class="card-body">

<div class="alert alert-info">

<b>Total Result Records:</b>

<?php echo mysqli_num_rows($result); ?>

</div>

<div class="table-responsive">

<table class="table table-hover table-bordered align-middle">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Student Name</th>
<th>Subject</th>
<th>Marks</th>
<th>Status</th>

</tr>

</thead>

<tbody>

<?php
mysqli_data_seek($result,0);

while($row=mysqli_fetch_assoc($result))
{
?>

<tr class="result-row">

<td><?php echo $row['id']; ?></td>

<td>
<strong>
<?php echo $row['name']; ?>
</strong>
</td>

<td><?php echo $row['subject']; ?></td>

<td><?php echo $row['marks']; ?></td>

<td>

<?php
if($row['marks'] >= 40)
{
?>

<span class="badge bg-success">
PASS
</span>

<?php
}
else
{
?>

<span class="badge bg-danger">
FAIL
</span>

<?php
}
?>

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
