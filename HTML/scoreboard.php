 <?php
require("/storage/ssd5/777/12715777/public_html/database_/connection.php");

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
     <link href="style.css" rel='stylesheet' type='text/css'/>
     <!--Metadata-->
	<meta charset="utf-8">
    <meta name="description" content="Scoreboard Page">
    <meta name="author" content="Kenta">
	<meta name="contributors" content="Yashaswi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
     
     <style>
     .leaderBoard table{
       height: 200px;
       color:#adde82;
       font-size:20px;
     }
     
     h {
      display:block;
     	color:#adde82;
     	font-size:60px;
     	text-align:center;
     	font-family: 'Muli', sans-serif;
     }


     h2 {
      display:block;
     	color:#adde82;
     	font-size:46px;
     	text-align:center;
     	font-family: 'Muli', sans-serif;
     	margin-top:66px;
     }
     
     .topnav a {
        color:#adde82;
     }

     </style>
   </head>
   <body>
     <h align="center">EXESEARCH</h>
     <ul class="topnav">
       <li><a href="./quiz.html">Challenge</a></li>
       <li><a href="./ScoreBoard.php">Scoreboard</a></li>
     </ul>
     <div class="leaderBoard">
       <h1>Score Boad</h1>
       <table align="center"border="3">
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
