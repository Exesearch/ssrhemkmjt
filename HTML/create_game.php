<?php
session_start();
$conn = mysqli_connect("emps-sql.ex.ac.uk","yk326","yk326","yk326","3306");

if(isset($_POST['game_name'])){

    $game_name = $_POST['game_name'];
    $meeting_location = $_POST['meeting_location'];
    $locations = "l".$game_name;

    //same game name
    $query0 = "SELECT game_name FROM games WHERE $game_name == game_name;";
    $do_query0 = mysqli_query($conn,$query0);

    if (empty($do_query0)){

        $query1 = "INSERT INTO games(game_name, meeting_location) VALUES ('$game_name', '$meeting_location');";
        $do_query1 = mysqli_query($conn,$query1);

        $query2 = "CREATE TABLE $game_name (
                       question_id int not null auto_increment,
                       question varchar(20) not null,
                       answer varchar(20) not null,
                       points int not null,
                       location varchar(20) not null,
                       FOREIGN KEY(location) REFERENCES locations(locname),
                       primary key (question_id)
                       )";
        $do_query2 = mysqli_query($conn, $query2);

        $query10 = " CREATE TABLE IF NOT EXISTS $locations (
  locid int(11) NOT NULL AUTO_INCREMENT,
  locname varchar(10) NOT NULL,
  loclong float NOT NULL,
  loclat float NOT NULL,
  locrad int(11) NOT NULL,
  clue text NOT NULL,
  PRIMARY KEY (locid)
)  ";
$do_query10 = mysqli_query($conn, $query10);


        $question1 = $_POST['qns1'];
        $answer1 = $_POST['ans1'];
        $points1 = $_POST['pt1'];
        $location1 = $_POST['location_1'];

        $question2 = $_POST['qns2'];
        $answer2 = $_POST['ans2'];
        $points2 = $_POST['pt2'];
        $location2 = $_POST['location_2'];

        $question3 = $_POST['qns3'];
        $answer3 = $_POST['ans3'];
        $points3 = $_POST['pt3'];
        $location3 = $_POST['location_3'];

        $question4 = $_POST['qns4'];
        $answer4 = $_POST['ans4'];
        $points4 = $_POST['pt4'];
        $location4 = $_POST['location_4'];

        $question5 = $_POST['qns5'];
        $answer5 = $_POST['ans5'];
        $points5 = $_POST['pt5'];
        $location5 = $_POST['location_5'];


        if(!empty($question1) && !empty($answer1) && !empty($points1)&& !empty($location1)){
            $query3 = "INSERT INTO $game_name(question, answer, points, location) VALUES ('$question1', '$answer1','$points1', '$location1');";
            $query13 = "INSERT INTO $locations(locname, loclong, loclat, locrad, clue) SELECT (locname, loclong, loclat, locrad, clue) FROM locations WHERE locname = $location1";
            $do_query3 = mysqli_query($conn, $query3);
            $do_query13 = mysqli_query($conn, $query13);
            echo $query3;
        }

        if(!empty($question2) && !empty($answer2) && !empty($points2)&& !empty($location2)) {
            $query4 = "INSERT INTO $game_name(question, answer, points, location) VALUES ('$question2', '$answer2','$points2', '$location2');";
            $query14 = "INSERT INTO $locations(locname, loclong, loclat, locrad, clue) SELECT (locname, loclong, loclat, locrad, clue) FROM locations WHERE locname = $location2";
            $do_query4 = mysqli_query($conn, $query4);
            $do_query14 = mysqli_query($conn, $query14);
            echo $query4;
        }

        if(!empty($question3) && !empty($answer3) && !empty($points3)&& !empty($location3)) {
            $query5 = "INSERT INTO $game_name(question, answer, points, location) VALUES ('$question3', '$answer3','$points3', '$location3');";
            $query15 = "INSERT INTO $locations(locname, loclong, loclat, locrad, clue) SELECT (locname, loclong, loclat, locrad, clue) FROM locations WHERE locname = $location3";
            $do_query5 = mysqli_query($conn, $query5);
            $do_query15 = mysqli_query($conn, $query15);
            echo $query5;
        }

        if(!empty($question4) && !empty($answer4) && !empty($points4)&& !empty($location4)) {
            $query6 = "INSERT INTO $game_name(question, answer, points, location) VALUES ('$question4', '$answer4','$points4', '$location4');";
            $query16 = "INSERT INTO $locations(locname, loclong, loclat, locrad, clue) SELECT (locname, loclong, loclat, locrad, clue) FROM locations WHERE locname = $location4";
            $do_query6 = mysqli_query($conn, $query6);
            $do_query16 = mysqli_query($conn, $query16);
        }

        if(!empty($question5) && !empty($answer5) && !empty($points5)&& !empty($location5)) {
            $query7 = "INSERT INTO $game_name(question, answer, points, location) VALUES ('$question5', '$answer5','$points5', '$location5');";
            $query17 = "INSERT INTO $locations(locname, loclong, loclat, locrad, clue) SELECT (locname, loclong, loclat, locrad, clue) FROM locations WHERE locname = $location5";
            $do_query7 = mysqli_query($conn, $query7);
            $do_query17 = mysqli_query($conn, $query17);
        }

        //Game name taken
    }elseif (!empty($do_query0)){
        echo "<script type='text/javascript'>alert('Game name has been taken.');</script>";
    }

}


?>
