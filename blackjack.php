<?php
ini_set('display_errors', "1"); // om foutmeldingen te tonen
session_start();
$status="";

class Blackjack{

    // Properties
    public $score=0;
    public $show="";

    // Methods
    public function hit($player, $waarde, $getal){ // de knop/link functie werkt dus maar een keer! dat moet ik oplossen
        $this->score+=$getal;
        if($this->score < $waarde) {  // lus van maken met wat in de if is al voorwaarde
            $this->score+=$getal;
        }else{
            $this->score+=$getal;
        }
         if($this->score > 21) {  // so is the number is bigger than 21 x loses
             $this->show=$player." lose! Your score is: " . $this->score;
         }else{
             $this->show="<p>".$this->score."</p>";
         }
    }
    // get function
    public function stand(){
        return $this->show;
    }
    public function surrender(){
        return "The house has won!<br /><H1>GAME OVER!</H1>";
    }
}
$player = new Blackjack();
$dealer = new Blackjack();
if($_SERVER["REQUEST_METHOD"] == "POST") { }// en dan moet eigenlijk alles tss die post accolades komen en het form tussen de else }
    if (!empty($_GET)) { // die get nog verbergen in die post, dan heb ik twee pagina's nodig
        $status = $_GET['status']; // if you click on status the user plays

        if ($status == "HIT") {
            $player->hit("You", 2, 1);
            $_SESSION["player"]="$player->stand()";
            header("Location: http://blackjack.local/form.php");

        } elseif ($status == "STAND") { // if you click on stand the house plays
            $dealer->stand("The house", 15, 1);
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