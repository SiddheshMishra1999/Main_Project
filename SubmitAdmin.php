<?php

include_once 'server.php';

    header( "refresh:5 ;url=Received_display.php" );
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
        <a class="logo" href="Index.php"><img class="logo" width = "60" height="60" src="Beechtown Pediatric Center.png"> </a>

            <nav>
            <ul >
                    <li class="left-menu-items"><a href="Index.php">Home</a></li>
                    <li class="left-menu-items"><a href="Person_display.php">Person</a></li>
                    <li class="left-menu-items"><a href="Vaccine.php">Vaccines</a></li>
                    <li class="left-menu-items"><a href="Received_display.php">Vaccinations</a></li>
                    <li  class="left-menu-items" ><a href="Facility.php">Facilities</a></li>
                    <li class="left-menu-items" ><a href="Workers.php">Health Safety Workers</a></li>
                    <li class="left-menu-items"><a href='queries.php'> Search Results </a> </li>

 
                </ul>

                
            </nav>
        </div>
  </div>

    <div class="timer">
          <h1> </h1>
    </div>
    <script>
         var h1 = document.getElementsByTagName("h1");
            h1[0].innerHTML = " Thank you for Submitting! Redirecting to Vaccination page in 5 seconds";

            var sec         = 5,
            countDiv    = document.getElementById("timer"),
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
