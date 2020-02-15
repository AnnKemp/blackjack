<?php
session_start();
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
    <h1 class="text-center mb-5 mt-5">Blackjack: play() the game!"</h1>
    <div class="row">
        <div class="col-md-6">
        </div>
        <div class="form-group col-md-6">
            <?php echo $_SESSION["player"]; ?>
            <form action="blackjack.php/" method="post">
                <a class="btn btn-danger btn-lg mb-3" href="?status=HIT" role="button">HIT</a><span class="ml-1 align-middle">to lay a card</span><br />
                <a class="btn btn-warning btn-lg mb-3" href="?status=STAND" role="button">STAND</a><span class="ml-1 align-middle">to end your turn and let the house play</span><br />
                <a class="btn btn-info btn-lg mb-3" href="?status=SURRENDER" role="button">SURRENDER</a><span class="ml-1 align-middle">to surrender</span><br />
                <input type="submit" name="submit" class="btn btn-info btn-lg mb-3" value="START">
            </form>
        </div>
</body>
</html>
