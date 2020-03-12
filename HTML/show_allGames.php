<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="style.css">
<head>
    <title>Show Games</title>
    <link rel="stylesheet" href="style.css">

    <!--Metadata-->
    <meta charset="utf-8">
    <meta name="description" content="Show Games Page">
    <meta name="author" content="Ridita Hossain">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <h1>ExeSearch</h1>
</head>
<body>
<?php

//connecting to database

$conn = mysqli_connect("emps-sql.ex.ac.uk","yk326","yk326","yk326","3306");

$sql = "SELECT * FROM games";
$result= $conn-> query($sql);
?>

<table border='1'>
<tr>
<th>Game Name</th>
</tr>
<?php
while($row = mysqli_fetch_array($result))
{
?>
<tr>
<td><?php echo $row['game_name']; ?></td>
<td><a href="delete.php?game_id=<?php echo $row['game_id']; ?>">Delete</a></td>
</tr>
<?php
}
mysqli_close($conn);
?>
</table>
</body>
</html>
