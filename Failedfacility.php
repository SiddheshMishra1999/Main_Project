<?php

include_once 'server.php';
header( "refresh:5 ;url=Facility.php" );


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
<div class="navbar">
        <div class="container">
            <a class="logo" href="#">Comp 353 </a>

            <nav>
                <ul class="main-nav">
                    <li ><a href="Index.php">Home</a></li>
                    <li><a href="Facility.php"]>Facility</a></li>
                    <li><a href="Vaccine.php">Vaccines</a></li>
                    <li><a href="Facility.php">Facilities</a></li>
                </ul>

            </nav>
        </div>
    </div>
    <div class="timer2">
          <h1> </h1> 
    </div>
    <script>
         var h1 = document.getElementsByTagName("h1");
            h1[0].innerHTML = " Failed to submit: Facility id does not exist! Redirecting to Facility page in 5 seconds";

            var sec         = 5,
            countDiv    = document.getElementById("timer2"),
            secpass,
            countDown   = setInterval(function () {
                'use strict';
                
                secpass();
            }, 1000);

            function secpass() {
            'use strict';
            
            if (sec > 0) {
                
                sec = sec - 1;
                
            } else {
                
                clearInterval(countDown);
                
                countDiv.innerHTML = 'countdown done';
                
            }
        }

    </script>

</body>
</html>
