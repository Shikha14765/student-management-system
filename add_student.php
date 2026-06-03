


<?php
include("db.php");

if(isset($_POST['save']))
{
    $roll_no = $_POST['roll_no'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $branch = $_POST['branch'];
    $year = $_POST['year'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $photo = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];

    move_uploaded_file($tempname,"uploads/".$photo);

    mysqli_query($conn,
    "INSERT INTO students
    (roll_no,name,course,branch,year,email,phone,address,photo)
    VALUES
    ('$roll_no','$name','$course','$branch','$year','$email','$phone','$address','$photo')");

    echo "<script>
    alert('Student Added Successfully');
    window.location='view_students.php';
    </script>";
}
?>

<!DOCTYPE html>

<html>
<head>

<title>Add Student</title>

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

.card-header{
border-radius:20px 20px 0 0 !important;
}

.form-control{
border-radius:10px;
padding:12px;
}

.btn{
border-radius:10px;
padding:10px 20px;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark shadow">

<div class="container">

<span class="navbar-brand fs-4">
🎓 Student ERP
</span>

<a href="dashboard.php"
class="btn btn-light">

🏠 Dashboard

</a>

</div>

</nav>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-10">

<div class="card shadow-lg">

<div class="card-header bg-primary text-white">

<h3>
➕ Add New Student
</h3>

</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

<div class="row">

<div class="col-md-6 mb-3">

<label>📌 Roll Number</label>

<input
type="text"
name="roll_no"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>👨 Student Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>📚 Course</label>

<input
type="text"
name="course"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>🏫 Branch</label>

<input
type="text"
name="branch"
class="form-control"
required>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>🎓 Year</label>

<input
type="text"
name="year"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>📧 Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>📱 Phone Number</label>

<input
type="text"
name="phone"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>📷 Student Photo</label>

<input
type="file"
name="photo"
class="form-control"
required>

</div>

</div>

<div class="mb-3">

<label>🏠 Address</label>

<textarea
name="address"
class="form-control"
rows="3"></textarea>

</div>

<button
type="submit"
name="save"
class="btn btn-success">

💾 Save Student

</button>

<a href="view_students.php"
class="btn btn-primary">

👨‍🎓 View Students

</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>


















