<?php
require("./connection.php");

$sql="SELECT groupName, score FROM team ORDER BY score DESC LIMIT 5;";


$result=$conn->query($sql);
if ($result->num_rows>0) {
  while ($row=$result->fetch_assoc()) {
    $rows[] = $row;
  }
}else {
  //echo "Empty data" . "<br/>";
}

$conn->close();

 ?>


 <!DOCTYPE html>
 <html>
   <head>

    <!--Metadata-->
	  <meta charset="utf-8">
    <meta name="description" content="Scoreboard Page">
    <meta name="author" content="Kenta Morita">
	  <meta name="contributors" content="Sophie Selgrad, Yashaswi Karmacharya">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	  <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	  <link rel="stylesheet" type="text/css" href="util.css">
	  <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" href="style.css">

    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="js/main.js"></script>


</head>

<body>
  <img src= "lightgreen.png" alt="ExeSearch" class="logo">

  <nav>
      <ul>
          <li class="profile-icon"><a href="profile.php">Profile</a></li>
          <li class="scoreb-icon"><a href="scoreboard.php">Scoreboard</a></li>
          <li class="faq-icon"><a href="FAQ.html">FAQ</a></li>
      </ul>
  </nav>

  <h2>SCOREBOARD</h2>

  <div class="limiter">
    <div class="container-table1">
			<div class="wrap-table1">
				<div class="table1 ver1 m-b-110">
					<div class="table1-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Rank</th>
									<th class="cell100 column2">TeamName</th>
									<th class="cell100 column3">Score</th>
								</tr>
							</thead>
						</table>
					</div>

				<div class="table1-body js-pscroll">
						<table>
							<tbody>
								<tr class="row100 body">
                  <?php
                  $num=1;
                  foreach($rows as $row){
                    ?>
                    <tr>
                      <td class="cell100 column1"><?php echo $num; ?></td>
                      <td class="cell100 column2"><?php echo $row['groupName']; ?></td>
                      <td class="cell100 column3"><?php echo htmlspecialchars($row['score']); ?></td>
                    </tr>
                    <?php
                    $num+=1;
                  }
                  ?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

			</div>
		</div>
	</div>

  <script>
  $('.js-pscroll').each(function(){
    var ps = new PerfectScrollbar(this);
  $(window).on('resize', function(){
    ps.update();
    })
  });
  </script>

   </body>
 </html>
