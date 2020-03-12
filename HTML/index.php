<?php
        session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

    <!--Metadata-->
    <meta charset="utf-8">
    <meta name="description" content="Login and Registration Page">
    <meta name="author" content="Ridita Hossain, Sophie Selgrad">
    <meta name="contributor" content="Yashaswi Karmacharya">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <img src= "lightgreen.png" alt="ExeSearch" class="logo">
<body>

<div class="login-page">
    <div class="form">
        <!--form for registration form-->
        <!--Yashaswi edited registration-->
        <form class= "register-form" action= "register.php" method = "POST">
            <input type="text" name="username" placeholder = "Username" id="username" required>
            <input type="password" name="password" placeholder = "Password" id="password" required>
            <input type="email" name="email" placeholder = "Email" id="email" required>

            <!--to account for three different users-->
            <select name="occupation" onchange="yesnoCheck(this)">
                <option value="Student">Student</option>
                <option value="Tutor">Tutor</option>
                <option value="Gamemaster">Gamemaster</option>
            </select>

            <div id="ifYes" style="display: none;">
                <input type="text" name ="private_key" placeholder="Private Key"/>
            </div>

            </br>
            <!--button that will enter the credentials into database-->
            <button type="submit" name="submit" value= "Submit">Submit</button>
            <!--this will take user to login form if they are already registered-->
            <p class="message">Already Registered? <a href="#">Login</a></p>
        </form>

        <!--form for login form-->
        <form class="login-form" action= "register.php" method= "POST">
            <input type="text" name="username" placeholder = "Username" id="username" required>
            <input type="password" name="password" placeholder = "Password" id="password" required>
            <button type="submit" name="login_user" value= "Submit">Login</button>
            <p class="message">Not Registered? <a href="#">Register</a></p>
            <p class="message"><a href="reset-password.php">Forgot Password?</a></p>
        </form>

        <!--code to switch between login and registration form, acts like a toggle-->
        <script src='https://code.jquery.com/jquery-3.4.1.min.js'>
        </script>

        <script>
            $('.message a').click(function(){
                $('form').animate({height:"toggle",opacity:"toggle"},"slow");
            });

            function yesnoCheck(that) {
                if (that.value == "Tutor" || that.value == "Gamemaster") {

                    document.getElementById("ifYes").style.display = "block";
                } else {
                    document.getElementById("ifYes").style.display = "none";
                }
            }
        </script>

    </div>
</div>
</body>
</html>
