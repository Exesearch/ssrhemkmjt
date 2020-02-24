<?php
require("./connection.php");

$sql="SELECT username, score FROM users ORDER BY score DESC LIMIT 2;";


$result=$conn->query($sql);
if ($result->num_rows>0) {
  while ($row=$result->fetch_assoc()) {
    $rows[] = $row;
  }
}else {
  echo "Empty data" . "<br/>";
}

$conn->close();

 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <link href="CSS/style_sheet.css" rel='stylesheet' type='text/css'/>
     <style>
     .leaderBoard table{
       margin-left: 20%;
       height: 200px;
     }

     .leaderBoard h1 {
       text-align: center;
       font-size: 70px;
     }

     h2 {
       text-align: center;
       font-size: 50px;
     }

     </style>
   </head>
   <body>
     <a style = "font-family:copperplate;font-size:50px;font-style:oblique;" href="./index.php">Treasure Hunt</a>
     <ul class="topnav">
       <li><a href="./challenge.html">Challenge</a></li>
       <li><a href="./scoreBoard.php">Scoreboard</a></li>
     </ul>
     <div class="leaderBoard">
       <h1>Score Boad</h1>
       <table border="1">
         <tr><th width=500px>User name</th><th width=150px>Score</th></tr>

         <?php
         foreach($rows as $row){
           ?>
           <tr>
             <td><?php echo $row['username']; ?></td>
             <td><?php echo htmlspecialchars($row['score']); ?></td>
           </tr>
           <?php
         }
         ?>
       </table>
     </div>
     <h2> Rewards</h2>

   </body>
 </html>
