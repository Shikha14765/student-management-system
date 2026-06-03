<?php
include("db.php");

$result = mysqli_query($conn,
"SELECT students.name,
SUM(results.marks) as total_marks,
AVG(results.marks) as percentage
FROM results
INNER JOIN students
ON results.student_id = students.id
GROUP BY students.id");
?>

<!DOCTYPE html>
<html>
<head>
<title>Result Summary</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container mt-4">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h3>Result Summary</h3>
</div>

<div class="card-body">

<table class="table table-bordered">

<tr>
<th>Student Name</th>
<th>Total Marks</th>
<th>Percentage</th>
<th>Grade</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
    $percentage = round($row['percentage'],2);

    if($percentage >= 90)
    {
        $grade = "A+";
    }
    elseif($percentage >= 80)
    {
        $grade = "A";
    }
    elseif($percentage >= 70)
    {
        $grade = "B";
    }
    elseif($percentage >= 60)
    {
        $grade = "C";
    }
    else
    {
        $grade = "F";
    }
?>

<tr>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['total_marks']; ?></td>

<td><?php echo $percentage; ?>%</td>

<td><?php echo $grade; ?></td>

</tr>

<?php
}
?>

</table>

</div>

</div>

</div>

</body>
</html>