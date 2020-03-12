<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="style.css">
<head>
    <title>Show Games</title>
    <link rel="stylesheet" href="style.css">

    <!--Metadata-->
    <meta charset="utf-8">
    <meta name="description" content="Show Games Page">
    <meta name="author" content="Ridita Hossain, Sophie Selgrad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <img src= "lightgreen.png" alt="ExeSearch" class="logo">
</head>
<body>
<?php

//connecting to database

$conn = mysqli_connect("emps-sql.ex.ac.uk","yk326","yk326","yk326","3306");

$sql = "SELECT * FROM games";
$result= $conn-> query($sql);
?>

<div class="limiter">
  <div class="container-table1">
    <div class="wrap-table1">
      <div class="table1 ver1 m-b-110">
        <div class="table1-head">
          <table>
            <thead>
              <tr class="row100 head">
                <th class="cell100 column1">Game Name</th>
                <th class="cell100 column2">Delete?</th>
              </tr>
            </thead>
          </table>
        </div>

      <div class="table1-body js-pscroll">
          <table>
            <tbody>
              <tr class="row100 body">
                <?php
                while($row = mysqli_fetch_array($result))
                {
                ?>
                  <tr>
                    <td class="cell100 column1"><?php echo $row['game_name']; ?></td>
                    <td class="cell100 column2"><a href="delete.php?game_id=<?php echo $row['game_id']; ?>">Delete</a></td>
                  </tr>
                  <?php
                  }
                  mysqli_close($conn);
                  ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>
