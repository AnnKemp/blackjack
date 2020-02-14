<?php
ini_set('display_errors', "1"); // om foutmeldingen te tonen
$status="";

class Blackjack{

    // Properties
    public $score=0;
    public $show="";

    // Methods
    function hit($player, $waarde, $getal){

        if($this->score < $waarde) {  // lus van maken met wat in de if is al voorwaarde
            $this->score=$this->score+$getal;
        }else{
            $this->score=$this->score+$getal;
        }
         if($this->score > 21) {  // so is the number is bigger than 21 x loses
             $this->show=$player." lose! Your score is: " . $this->score;
         }else{
             $this->show="<p>".$this->score."</p>";
         }
    }
    // get function
    function stand(){
        return $this->show;
    }
    function surrender(){
        return "The house has won!<br /><H1>GAME OVER!</H1>";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") { // en dan moet eigenlijk alles tss die post accolades komen en het form tussen de else }
    if (!empty($_GET)) { // die get nog verbergen in die post, dan heb ik twee pagina's nodig
        $status = $_GET['status']; // if you click on status the user plays

        $player = new Blackjack();
        $dealer = new Blackjack();

        if ($status == "HIT") {
            $player->hit("You", 2, 1);
            echo $player->stand();
        } elseif ($status == "STAND") { // if you click on stand the house plays
            $dealer->hit("The house", 15, 1);
            echo $dealer->stand();
        } elseif ($status == "SURRENDER") { // if you click on surrender, you,the user, surrender
            $player->surrender();
        }
    }
// a function to clear all sessions for later when i use two pages
function allSessionsValueNull(){ // misschien nog typeren en de functie wanneer nodig aanroepen dus
    return $_SESSION["player"] = $_SESSION["house"] =  $_SESSION["playerSurrender"] = 0;
}
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
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <a class="btn btn-danger btn-lg mb-3" href="?status=HIT" role="button">HIT</a><span class="ml-1 align-middle">to lay a card</span><br />
        <a class="btn btn-warning btn-lg mb-3" href="?status=STAND" role="button">STAND</a><span class="ml-1 align-middle">to end your turn and let the house play</span><br />
        <a class="btn btn-info btn-lg mb-3" href="?status=SURRENDER" role="button">SURRENDER</a><span class="ml-1 align-middle">to surrender</span><br />
        <input type="submit" name="submit" class="btn btn-info btn-lg mb-3" value="START">
    </form>
</div>
</body>
</html>