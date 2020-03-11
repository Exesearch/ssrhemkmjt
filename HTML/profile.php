<?php
session_start();
$conn = mysqli_connect("emps-sql.ex.ac.uk","yk326","yk326","yk326","3306");

// Check user login or not
if(!isset($_SESSION['username'])){
    header('Location: profile.php');
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css">

<head>
    <!--Metadata-->
    <meta charset="utf-8">
    <meta name="description" content="Profile Page">
    <meta name="author" content="Yashaswi">
    <meta name="contributors" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
</head>

<body>

<img src= "lightgreen.png" alt="ExeSearch" class=".logo">

<h1>ExeSearch</h1>

<!--Yashaswi added this navigation bar-->
<nav>
    <ul>
        <li class="profile-icon"><a href="profile.php">Profile</a></li>
        <li class="scoreb-icon"><a href="scoreboard.php">Scoreboard</a></li>
        <li class="faq-icon"><a href="FAQ.html">FAQ</a></li>
    </ul>
</nav>

<h2>Welcome <?php echo $_SESSION["username"]; ?></h2>

<div id="frame001">
    <div id="center001">
        <div id ="color001">

            <label for="group_name">You are in group: <?php

            $username = $_SESSION["username"];

            $result = mysqli_query($conn,"SELECT groupName FROM team WHERE member1='$username' OR member2='$username' OR member3='$username'
                    OR member4='$username' OR member5='$username' OR member6='$username' OR member7='$username' OR member8='$username'
                    OR member9='$username' OR member10='$username';");

            $row = mysqli_fetch_assoc($result);
            $group_name=$row["groupName"];

            if(!empty($group_name)){

                echo $group_name;

            }else{

                echo "-";
            }


            ?>
            </label>

            <form class="your_games" action="profile_action.php" method="POST">

                </br>
                <label>Press ready when you are at your meeting location for the game. The start button will be enabled
                    when at least 50% of your team members have clicked the ready button and are at the meeting location.
                    You may view your progress of each game by using the "View Progress" button.</label>
                </br>
                </br>
                <label>Your Games</label>

                <div class="game_progress">

                    <?php

                    $query0 = "SELECT * FROM games;";
                    $do_query0 = mysqli_query($conn,$query0);

                    if(mysqli_num_rows($do_query0)==0){

                        echo 'No games have been created by the Game Master yet.';

                    }elseif(mysqli_num_rows($do_query0)>0){
                        while($row = mysqli_fetch_assoc($do_query0)){

                            echo $row['game_name']." ";
                            echo '<button type="button" name="ready" action="profile_action.php">Ready</button>';


                            echo '<button type="button" disabled name="start">Start</button>';
                            echo '<button type="button" disabled name="progress">View Progress</button>';

                            echo '<label> Meeting location: </label>';
                            echo $row['meeting_location'];
                            echo '</br>';
                        }
                    }
                    ?>


                </div>

            </form>



            <form class="profile1" action="profile_action.php" method="POST">

                </br>

                <label for="username">Username</label>
                </br>

                <input type="text" id="username" name="username" placeholder="New Username">
                <input type="submit" name="save" value="Save Changes">

                </br>
                </br>
            </form>

            <form name="frmChange" method="POST" action="profile_action.php" onSubmit="return validatePassword()">
                <div class="message"><?php if(isset($message)) { echo $message; } ?></div>

                <label for="username">Change Password</label>
                </br>
                <input type="password" id="currentPassword" name="currentPassword" placeholder="Current Password" class="txtField" required/>
                </br>
                <input type="password" id="newPassword" name="newPassword" placeholder="New Password" class="txtField" required/>
                </br>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="txtField" required/>
                <input type="submit" name="save2" value="Save Changes" class="btnSubmit">

            </form>

            </br>


            <?php
            session_start();
            // Check user login or not
            $conn = mysqli_connect("emps-sql.ex.ac.uk","yk326","yk326","yk326","3306");

            $current_username = $_SESSION['username'];
            $result = mysqli_query($conn, "SELECT occupation FROM Users WHERE uname='$current_username'");
            $row = mysqli_fetch_array($result);

            if($row['occupation'] == "Tutor"){

                echo '<form action="tutor.php"><input type="submit" value="Tutor Mode" /></form>';

            } elseif($row['occupation'] == "Gamemaster"){

                echo '<form action="gamemaster.php"><input type="submit" value="Gamemaster Mode" /></form>';

            }

            ?>



            </br>
            <a href="logout.php">Logout</a>

        </div>
    </div>
</div>



</body>
</html>
