<?php
session_start(); // to reach the session values

// ofwel met GET werken en daar linken van maken en daar op het einde telkens de waarde vanachter meegeven
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Blackjack game</title>
</head>
<body>
<div class="container">
    <h1>Blackjack: play() the game!"</h1>
<form action="game.php" method="get">
    <p><?php // if ... echo $_SESSION["player"]// die waarden uit die sessions tonen ?>

    </p>
    <a class="btn btn-success btn-lg" href="?status=START" role="button">START the GAME!</a>
    <a class="btn btn-info btn-lg" href="?status=HIT" role="button">HIT</a>
    <a class="btn btn-warning btn-lg" href="?status=STAND" role="button">STAND</a>
    <a class="btn btn-danger btn-lg" href="?status=SURRENDER" role="button">SURRENDER</a>
    <input class="btn btn-default btn-lg" type="submit" name="submit" value="Enter play change">

</form>
</div>
</body>
</html>