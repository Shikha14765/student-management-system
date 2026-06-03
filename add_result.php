<?php
include("db.php");

if(isset($_POST['save']))
{
    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    mysqli_query($conn,
    "INSERT INTO results
    (student_id,subject,marks)
    VALUES
    ('$student_id','$subject','$marks')");

    echo "<script>
    alert('Result Added Successfully');
    </script>";
}

$students = mysqli_query($conn,
"SELECT * FROM students");
?>

<!DOCTYPE html>
<html>
<head>

<title>Add Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand">
Result Management
</a>

<a href="dashboard.php"
class="btn btn-light">
Dashboard
</a>

</div>

</nav>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Add Result</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Select Student</label>

<select
name="student_id"
class="form-control"
required>

<option value="">
Choose Student
</option>

<?php
while($row=mysqli_fetch_assoc($students))
{
?>

<option value="<?php echo $row['id']; ?>">

<?php echo $row['name']; ?>

</option>

<?php
}
?>

</select>

</div>

<div class="mb-3">

<label>Subject</label>

<input
type="text"
name="subject"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Marks</label>

<input
type="number"
name="marks"
class="form-control"
required>

</div>

<button
type="submit"
name="save"
class="btn btn-success">

Save Result

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>