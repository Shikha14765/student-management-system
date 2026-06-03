
<?php
session_start();
include("db.php");

if(!isset($_SESSION['admin']))
{
    header("Location: login.php");
    exit();
}

$studentQuery = mysqli_query($conn,"SELECT COUNT(*) as total FROM students");
$studentData = mysqli_fetch_assoc($studentQuery);

$attendanceQuery = mysqli_query($conn,"SELECT COUNT(*) as total FROM attendance");
$attendanceData = mysqli_fetch_assoc($attendanceQuery);

$resultQuery = mysqli_query($conn,"SELECT COUNT(*) as total FROM results");
$resultData = mysqli_fetch_assoc($resultQuery);

$totalStudents = $studentData['total'];
$totalAttendance = $attendanceData['total'];
$totalResults = $resultData['total'];
?>

<!DOCTYPE html>

<html>
<head>

<title>Student ERP Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f4f7fc;
font-family:Arial,sans-serif;
}

.sidebar{
position:fixed;
width:250px;
height:100vh;
background:#1e293b;
padding-top:20px;
}

.sidebar h3{
color:white;
text-align:center;
margin-bottom:30px;
}

.sidebar a{
display:block;
padding:15px 20px;
color:white;
text-decoration:none;
font-size:16px;
transition:0.3s;
}

.sidebar a:hover{
background:#3b82f6;
padding-left:30px;
}

.main-content{
margin-left:250px;
padding:30px;
}

.card{
border:none;
border-radius:20px;
color:white;
}

.card1{
background:linear-gradient(135deg,#4facfe,#00f2fe);
}

.card2{
background:linear-gradient(135deg,#43e97b,#38f9d7);
}

.card3{
background:linear-gradient(135deg,#fa709a,#fee140);
}

.info-card{
background:white;
color:black;
border-radius:20px;
}

.icon-box{
background:white;
border-radius:15px;
padding:20px;
text-align:center;
transition:0.3s;
}

.icon-box:hover{
transform:translateY(-5px);
}

</style>

</head>

<body>

<div class="sidebar">

<h3>🎓 Student ERP</h3>

<a href="dashboard.php">🏠 Dashboard</a> <a href="add_student.php">➕ Add Student</a> <a href="view_students.php">👨‍🎓 View Students</a> <a href="attendance.php">📅 Attendance</a> <a href="attendance_report.php">📊 Attendance Report</a> <a href="add_result.php">📝 Add Result</a> <a href="view_result.php">📄 View Result</a> <a href="result_summary.php">🏆 Result Summary</a> <a href="logout.php">🚪 Logout</a>

</div>

<div class="main-content">

<div class="bg-white p-4 rounded shadow-sm mb-4">

<h2>🎓 Welcome, Admin</h2>

<p class="text-muted">
Manage Students, Attendance, Results and Reports from one dashboard.
</p>

</div>

<div class="row">

<div class="col-md-4 mb-3">

<div class="card card1 shadow">

<div class="card-body text-center">

<h5>Total Students</h5>

<h1><?php echo $totalStudents; ?></h1>

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card card2 shadow">

<div class="card-body text-center">

<h5>Attendance Records</h5>

<h1><?php echo $totalAttendance; ?></h1>

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card card3 shadow">

<div class="card-body text-center">

<h5>Total Results</h5>

<h1><?php echo $totalResults; ?></h1>

</div>

</div>

</div>

</div>

<div class="row mt-4">

<div class="col-md-3 mb-3">

<div class="icon-box shadow">

<h1>👨‍🎓</h1>

<h6>Students</h6>

</div>

</div>

<div class="col-md-3 mb-3">

<div class="icon-box shadow">

<h1>📅</h1>

<h6>Attendance</h6>

</div>

</div>

<div class="col-md-3 mb-3">

<div class="icon-box shadow">

<h1>📝</h1>

<h6>Results</h6>

</div>

</div>

<div class="col-md-3 mb-3">

<div class="icon-box shadow">

<h1>📊</h1>

<h6>Reports</h6>

</div>

</div>

</div>

<div class="card info-card shadow mt-4">

<div class="card-body">

<h4>📌 Project Information</h4>

<p>
Student Record Management System using PHP, MySQL and Bootstrap.
</p>

<ul>
<li>Student Management</li>
<li>Attendance Management</li>
<li>Result Management</li>
<li>Photo Upload</li>
<li>Report Generation</li>
</ul>

</div>

</div>

</div>

</body>
</html>
