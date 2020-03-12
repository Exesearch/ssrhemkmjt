<?php
require("./connection.php");
session_start();



$sql="SELECT qnid, question, answer, points FROM questions;";

$result = mysqli_query($conn, $sql);
if ($result->num_rows>0) {
  while ($row=$result->fetch_assoc()) {
    $rows[] = $row;
  }
}else {
  echo "Empty data" . "<br/>";
}

$lsql = "SELECT locid, locname, loclong, loclat, clue, locrad FROM locations;";
$lresult = mysqli_query($conn, $lsql);
if ($lresult->num_rows>0) {
  while ($lrow=$lresult->fetch_assoc()) {
    $lrows[] = $lrow;
  }
}else {
  echo "Empty data" . "<br/>";
}



 ?>

<!DOCTYPE html>
<html lang="en" xmlns="https://www.w3.org/1999/xhtml">
<head>

	<!--Metadata-->
	<meta charset="utf-8">
    <meta name="description" content="Quiz Page">
    <meta name="author" content="Jacob">
	<meta name="contributors" content="Nell,Sophie,Yashaswi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Icons courtesy of Freepik from www.flaticon.com-->

	<title>ExeSearch</title>
	<link rel="stylesheet" href="style.css">

</head>
<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript" href="quiz.js"></script>

<body>

<h1>ExeSearch</h1>

<nav id="navigationBar">
  <ul>
    <li class="profile-icon"><a href="profile.html">Profile</a></li>
    <li class="quiz-icon"><a href="quiz.html">Quiz</a></li>
    <li class="scoreb-icon"><a href="scoreboard.php">Scoreboard</a></li>
    <li class="faq-icon"><a href="FAQ.html">FAQ</a></li>
  </ul>
</nav>

<h2>Treasure Hunt</h2>

<div id="frame001">
  <div id="color001">
    <div id="center001">
      <?php foreach($rows as $row){ ?>
        <?php
        echo "<div class=\"questions\"> Question ".$row['qnid'].":".$row['question']." POINTS:".$row['points']." ";
        echo "<input id=\"input00".$row['qnid'].'"'."onkeyup=\"this.value = this.value.toUpperCase();\""." size=\"15\">";
        echo "<text class=\"button002\" id=\"check00".$row['qnid']."\"></text>";
        echo "</div>";
?>
<?php } ?>
            <div id="center001"><button class="submitbutton" onclick="submitclick()">Submit</button></div><br/>
<div id="disappear001"><div id="center001"><button class="nextbutton" onclick="submit003()">Next</button></div></div><br/>
<div id="center001"><p id="message001"></p><p id="reload001"></p></div>
<div id="center001"><button class= "geoclicker" onclick= "getLocation()">WHERE AM I ?!?! </button></div>
      <br /><p id="locations"></p><br />
    </div>
  </div>
</div>
<p id = "saveWarningText"></p>


    <script>

    $questions = $('.questions');
    $('.questions').fadeOut();
    $questions.hide();
    var totalQuestions = $('.questions').size();
    var currentQuestion = 0;
    $('.nextbutton').hide();
    $('.geoclicker').hide();
    $('#locations').hide();
    $($questions.get(currentQuestion)).fadeIn();
    <?php foreach($rows as $row){ ?>
      <?php
        echo "var an".$row['qnid']." = 0;";
        echo "var tryv".$row['qnid']." = 6;";
        echo "var qp".$row['qnid']."=".$row['points'].";";
        ?>
        <?php } ?>
	var distance;			//Distance between user location and target
	var userLat;			//User location latitude
	var userLatRadians;		//In radians
	var userLong;			//User location longitude
	var userLongRadians;		//In radians
	var targetLat = 0;		//The target latitude
	var targetLatRadians;		//In radians
	var targetLong = 0;		//The target longitude
	var targetLongRadians;		//In radians
	var longDifference;		//The difference between user and target longitude
        var radius = 0;
        var currscore = 0;

        var x = document.getElementById("locations");


        function submitclick() {

            <?php foreach($rows as $row){ ?>
              <?php
              echo "as".$row['qnid']." = input00".$row['qnid'].".value;";
              echo "if (as".$row['qnid']." == ".'"'.$row['answer'].'"'.") {";
              echo "currscore = qp".$row['qnid'].";";
              echo "an".$row['qnid']." += 1;";
              echo "input00".$row['qnid'].".value = as".$row['qnid'].";";
              echo "check00".$row['qnid'].".innerHTML = \"<text class=button002>\" + \"✔\" + \"</text>\";";
              echo "}else if(tryv".$row['qnid'].">= 1){";
              echo "tryv".$row['qnid']."-= 1;";
              echo "input00".$row['qnid'].".value = as".$row['qnid'].";";
              echo "check00".$row['qnid'].".innerHTML = \"<text class=button00".$row['qnid'].">\" + \"✖ Oops Try Again TRIES LEFT: \" + tryv".$row['qnid']." + \"</text>\";";
              echo "}else if(tryv".$row['qnid']." < 1){";
              echo "check00".$row['qnid'].".innerHTML = \"<text class=button00".$row['qnid'].">\" + \"✖ Oops NO MORE TRIES\" + \"</text>\";";
              echo "}";

              ?>
              <?php } ?>

              <?php foreach($lrows as $lrow){ ?>
                <?php
                echo "if (an".$lrow['locid']." == 1 || tryv".$lrow['locid']."<1){";
                echo "\n \$('.nextbutton').fadeIn();";
                echo "\nmessage001.innerHTML = \"Clue for location ".$lrow['locid']."! <br/> Clue: ".$lrow['clue']."\""."\n\$('#message001').fadeIn();"."\n \$('.button002').fadeIn();"."\n \$('.geoclicker').fadeIn();";
                echo "\ntargetLat = ".$lrow['loclat'];
                echo "\ntargetLong = ".$lrow['loclong'];
                echo "\nradius = ".$lrow['locrad'];
                echo "}";

            ?>
            <?php } ?>

            if (an1 == 5) {
                message001.innerHTML = "Congratulation! You have successfully finished this quiz.";
                disappear001.innerHTML = "";
                reload001.innerHTML = "<div id=center001><button class=submitbutton onclick=repeat001()>Repeat</button></div>";



              }
        }
            function repeat001() {
                location.reload();
            }
      $('.nextbutton').click(function submit003() {
      $('.nextbutton').fadeOut();
      $('#message001').fadeOut();
      $('.button002').fadeOut();
      $('.geoclicker').fadeOut();
      $('#locations').fadeOut();
      $($questions.get(currentQuestion)).fadeOut(function () {


        currentQuestion = currentQuestion + 1;

        //if there are no more questions do stuff
        if (currentQuestion == totalQuestions) {
            alert("YOU WON");
            $('#message001').fadeIn();
            alert(totalscore);
            message001.innerHTML = "Congratulation! You have successfully finished this quiz.";
            disappear001.innerHTML = "";

        } else {

            //otherwise show the next question
            $($questions.get(currentQuestion)).fadeIn();

        }
    });

});
    function getLocation() {
	//Written by: Nell, modified by: Jacob
	//Check if geolocation is "true" i.e. enabled
	if (navigator.geolocation) {
		//If so, get the current user location and check against target
        	navigator.geolocation.getCurrentPosition(showPosition);
      	} else {
        	x.innerHTML = "Geolocation is not supported by this browser.";
      	}
    }

    function showPosition(position) {
	//Written by: Nell, modified by: Jacob
	userLat = position.coords.latitude;
	userLong = position.coords.longitude;

	//Find the distance between target and current position
	//User spherical law of cosines - should be accurate to a few metres

	userLatRadians = toRad(userLat);
      	targetLatRadians = toRad(targetLat);
      	longDifference = toRad(targetLong - userLong);
      	earthRadius = 6371000;
      	distance = Math.acos( Math.sin(userLatRadians)*Math.sin(targetLatRadians)
    			+ Math.cos(userLatRadians)*Math.cos(targetLatRadians)
    			*Math.cos(longDifference)) * earthRadius;

	//Check that it is within range
      	if (distance <= radius) {

        	x.innerHTML ="Success!" ;
           	$('#locations').fadeIn();
            	$('.nextbutton').fadeIn();
        } else {
        	x.innerHTML ="Failure!";
            	$('#locations').fadeIn();
        }
    }

    function toRad(Value) {
        /** Converts numeric degrees to radians */
        return Value * Math.PI / 180;
    }
    </script>

</body>
</html>
