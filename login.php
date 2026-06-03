

<?php
session_start();
include("db.php");

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query)>0)
    {
        $_SESSION['admin']=$username;
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $error="Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>

<html>
<head>

<title>Student Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:linear-gradient(135deg,#667eea,#764ba2);
}

.login-card{
width:400px;
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

.title{
text-align:center;
margin-bottom:20px;
font-weight:bold;
}

.icon{
font-size:60px;
text-align:center;
display:block;
}

</style>

</head>

<body>

<div class="login-card">

<div class="icon">
🎓
</div>

<h2 class="title">
Student Management System
</h2>

<form method="POST">

<div class="mb-3">

<label>Username</label>

<input
type="text"
name="username"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
type="submit"
name="login"
class="btn btn-primary w-100">

Login

</button>

</form>

<?php
if(isset($error))
{
?>

<div class="alert alert-danger mt-3">
<?php echo $error; ?>
</div>

<?php
}
?>

</div>

</body>
</html>
