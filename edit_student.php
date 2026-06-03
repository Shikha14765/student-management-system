<?php
include("db.php");

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM students WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    mysqli_query($conn,
    "UPDATE students SET
    name='$name',
    course='$course',
    email='$email',
    phone='$phone'
    WHERE id='$id'");

    header("Location:view_students.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">

Name:
<input type="text" name="name"
value="<?php echo $row['name']; ?>">
<br><br>

Course:
<input type="text" name="course"
value="<?php echo $row['course']; ?>">
<br><br>

Email:
<input type="email" name="email"
value="<?php echo $row['email']; ?>">
<br><br>

Phone:
<input type="text" name="phone"
value="<?php echo $row['phone']; ?>">
<br><br>

<button name="update">
Update Student
</button>

</form>

</body>
</html>