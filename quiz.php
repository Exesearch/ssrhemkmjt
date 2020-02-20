<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>EXESEARCH</title>
</head>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript" href="quiz.js"></script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<body>
    <style>
        #frame001 {
            background-color: white;
            border: 2px solid black;
            border-radius: 10px;
            width: auto;
            height: auto;
            padding: 5px;
        }

        #color001 {
            color: black;
            font-size: large;
            text-align: left;
        }

        #center001 {
            text-align: center;
        }

        .button001 {
            background-color: blue;
            color: white;
            border-radius: 10px;
            padding: 5px;
            cursor: pointer;
        }
        .button003 {
            background-color: blue;
            color: white;
            border-radius: 10px;
            padding: 5px;
            cursor: pointer;
        }

        .button002 {
            width: 10px;
            height: 10px;
        }
    </style>
    <div id="frame001">
        <div id="color001">
            <div id="center001">
                <h2><strong>EXESEARCH QUIZ</strong></h2>
<div class="questions">Question 1: <input id="input001" size="15" /><text class="button002" id="check001"></text>
</div><div class="questions">Question 2: <input id="input002" size="15" /><text class="button002" id="check002"></text>
</div><div class="questions">Question 3: <input id="input003" size="15" /> <text class="button002" id="check003"></text>
</div><div class="questions">Question 4: <input id="input004" size="15" /><text class="button002" id="check004"></text>
</div><div class="questions">Question 5: <input id="input005" size="15" /><text class="button002" id="check005"></text>
  <p id="demo"></p>
  </div>
            <div id="disappear001"><div id="center001"><button class="button001" onclick="submit001()">Submit</button></div></div><br />
            <div id="center001"><button class="button003" onclick="submit003()">Next</button></div><br />
            <div id="center001"><p id="message001"></p><p id="reload001"></p></div>
                <br />
            <br />
            </div>
    </div>


    <script>
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;
}
    $questions = $('.questions');
    $('.questions').fadeOut();
    $questions.hide();
    var totalQuestions = $('.questions').size();
    var currentQuestion = 0;
    $('.button003').hide();
    $($questions.get(currentQuestion)).fadeIn();
        var g;
        var h;
        var i;
        var j;
        var k;
        function submit001() {
            b = input001.value;
            c = input002.value;
            d = input003.value;
            e = input004.value;
            f = input005.value;
            if (b == "Answer1" || b == "answer1") {
                g = 1;
                input001.value = b;
                check001.innerHTML = "<text class=button002>" + "✔" + "</text>";
            } else {
                input001.value = b;
                check001.innerHTML = "<text class=button002>" + "✖" + "</text>";
            }

            if (c == "Answer2" || c == "answer2") {
                h = 1;
                input002.value = c;
                $()
                check002.innerHTML = "<text class=button002>" + "✔" + "</text>";
            } else {
                input002.value = c;
                check002.innerHTML = "<text class=button002>" + "✖" + "</text>";
            }

            if (d == "Answer3" || d == "answer3") {
                i = 1;
                input003.value = d;
                check003.innerHTML = "<text class=button002>" + "✔" + "</text>";
            } else {
                input003.value = d;
                check003.innerHTML = "<text class=button002>" + "✖" + "</text>";
            }

            if (e == "Answer4" || e == "answer4") {
                j = 1;
                input004.value = e;
                check004.innerHTML = "<text class=button002>" + "✔" + "</text>";
            } else {
                input004.value = e;
                check004.innerHTML = "<text class=button002>" + "✖" + "</text>";
            }

            if (f == "Answer5" || f == "answer5") {
                k = 1;
                input005.value = f;
                check005.innerHTML = "<text class=button002>" + "✔" + "</text>";
            } else {
                input005.value = f;
                check005.innerHTML = "<text class=button002>" + "✖" + "</text>";
            }
            if (g == 1)
            {
              message001.innerHTML = "Here is your first location!"
              $('.button003').fadeIn();
              $('.button002').fadeIn();

            }

            if (h == 1)
            {
              message001.innerHTML = "Here is your second location!"
              $('#demo').fadeIn();
              $('.button003').fadeIn();
              $('#message001').fadeIn();
              $('.button002').fadeIn();

            }
            if( i == 1)
            {
              message001.innerHTML = "Here is your third location!"
              $('.button003').fadeIn();
              $('#message001').fadeIn();
              $('.button002').fadeIn();

            }
            if(j==1)
            {
              message001.innerHTML = "Here is your fourth location!"
              $('.button003').fadeIn();
              $('#message001').fadeIn();
              $('.button002').fadeIn();

            }
            if(k==1)
            {
              message001.innerHTML = "Here is your final location!"
              $('.button003').fadeIn();
              $('#message001').fadeIn();
              $('.button002').fadeIn();

            }

            if (g == 1 && h == 1 && i == 1 && j == 1 && k == 1) {
                message001.innerHTML = "Congratulation! You have successfully finished this quiz.";
                disappear001.innerHTML = "";
                reload001.innerHTML = "<div id=center001><button class=button001 onclick=repeat001()>Repeat</button></div>";
            }
        }

            function repeat001() {
                location.reload();
            }
            $('.button003').click(function () {

      $('.button003').fadeOut();
      $('#message001').fadeOut();
      $('.button002').hide();
     $($questions.get(currentQuestion)).fadeOut(function () {


        currentQuestion = currentQuestion + 1;

        //if there are no more questions do stuff
        if (currentQuestion == totalQuestions) {

            alert("YOU WON");

        } else {

            //otherwise show the next question
            $($questions.get(currentQuestion)).fadeIn();

        }
    });

});
    </script>
</body>
</html>
