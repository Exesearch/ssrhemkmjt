<?php
session_start();

if (isset($_SESSION['message'])) {
  $message=$_SESSION['message'];
}

require("./connection.php");

$sql="SELECT * FROM team JOIN tutors;";

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
<html >
  <head>
    <!--Metadata-->
	  <meta charset="utf-8">
    <meta name="description" content="Tutor Page">
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

    <script src="./confirmation.js"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="js/main.js"></script>


    <title>Tutor Page</title>
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

    <h2>Teams</h2>
    <div id="frame001">
        <div id="center001">
            <div id ="color001">
              <p>You can create a team of your turtorial group by giving a team name, your username(as a tutor), and at least 5 students university username.</p>
              <p>Please write their usernames correctly to let them be in your team.</p>
              <p>PLEASE make sure your team name is not used by other team listed below.</p>
            </div>
          </div>
        </div>

    <div class="limiter">
      <div class="container-table1">
  			<div class="wrap-table1">
  				<div class="table1 ver1 m-b-110">
  					<div class="table1-head">
  						<table>
  							<thead>
  								<tr class="row100 head">
  									<th width=15%>TeamName</th>
  									<th width=15%>TutorName</th>
                    <th width=7%>member</th>
                    <th width=7%>member</th>
                    <th width=7%>member</th>
                    <th width=7%>member</th>
                    <th width=7%>member</th>
                    <th width=7%>member</th>
                    <th width=7%>member</th>
                    <th width=7%>member</th>
                    <th width=7%>member</th>
                    <th width=7%>member</th>
  								</tr>
  							</thead>
  						</table>
  					</div>

  				<div class="table1-body js-pscroll">
  						<table>
  							<tbody>
  								<tr class="row100 body">
                    <?php


                    foreach($rows as $row){
                      ?>
                      <tr>
                        <td width=15%><?php echo $row['groupName']; ?></td>
                        <td width=15%><?php echo ($row['tutor_name']); ?></td>
                        <td width=7%><?php echo ($row['member1']); ?></td>
                        <td width=7%><?php echo ($row['member2']); ?></td>
                        <td width=7%><?php echo ($row['member3']); ?></td>
                        <td width=7%><?php echo ($row['member4']); ?></td>
                        <td width=7%><?php echo ($row['member5']); ?></td>
                        <td width=7%><?php echo ($row['member6']); ?></td>
                        <td width=7%><?php echo ($row['member7']); ?></td>
                        <td width=7%><?php echo ($row['member8']); ?></td>
                        <td width=7%><?php echo ($row['member9']); ?></td>
                        <td width=7%><?php echo ($row['member10']); ?></td>
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

    <div class="error">
      <?php
      if (isset($message)) {
        echo "<p1>$message</p1>";
        unset($_SESSION['message']);
      };
      ?>
    </div>

    <div id="frame001">
        <div id="center001">
            <div id ="color001">
    <div class="team_making">
        <p id="Adding">Add a new team:</p>
        <form class="form_1" name="add" action="team_modification.php" method="post">
        <p>TeamName: <input type="text" name="team_name" value=""></p>
        <p>TutorName:
        <input type="text" name="tutor_name" value=""></p>
        <p>Username:
        <input type="text" name="member1" value=""></p>
        <p>Username:
        <input type="text" name="member2" value=""></p>
        <p>Username:
        <input type="text" name="member3" value=""></p>
        <p>Username:
        <input type="text" name="member4" value=""></p>
        <p>Username:
        <input type="text" name="member5" value=""></p>
        <p>Username:
        <input type="text" name="member6" value=""></p>
        <p>Username:
        <input type="text" name="member7" value=""></p>
        <p>Username:
        <input type="text" name="member8" value=""></p>
        <p>Username:
        <input type="text" name="member9" value=""></p>
        <p>Username:
        <input type="text" name="member10" value=""></p>
        <input name="add" type="submit" value="add">
      </form>

      <p id="Delete">Delete a team:</p>
      <form class="form_1" name="delete" action="team_modification.php" method="post">
        <p>TeamName:</p>
        <input type="text" name="delete_team" value="">
        <input name="delete" type="submit" value="delete" onclick='return function1();'>
    </div></div></div></div>

  </body>
</html>
