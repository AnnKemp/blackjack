<?php
ini_set('display_errors', "1"); // om foutmeldingen te tonen
session_start();
$status="";

class Blackjack{ // made the class more oop and now you can easily add extra players

    // Properties
    public $score=0;
    public $show="";

    // Methods
    public function hit($player, $waarde, $getal){ // de knop/link functie werkt dus maar een keer! dat moet ik oplossen daarom telt ie dus nie op en blijft het maar bij ene keer
        $this->score+=$getal; // a test (daarna terug weg doen)
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
// 3) als ik het optellen in orde krijg, die randomnumber terug toevoegen in $getal
// nog te doen: 1) da tonen van de gegevens terug in orde brengen want dat is even weg nu 2) dan da get post probleem: verbergen van waarden in de url, de get-knop meer dan één keer gegevens laten doorsturen

if($_SERVER["REQUEST_METHOD"] == "POST") { // ne get in ne post macheert da?? de problemen komen van die get post combinatie dat moet ik nog uitpluizen
    if (!empty($_GET)) { // die get nog verbergen in die pos
        $status = $_GET['status']; // if you click on status the user plays

        if ($status == "HIT") {
            $player->hit("You", 2, 1);
            echo $player->stand();  // om te testen
            $_SESSION["player"] = $player->stand();

        } elseif ($status == "STAND") { // if you click on stand the house plays
            $dealer->stand("The house", 15, 1);
            echo $dealer->stand();  // om te testn
            $_SESSION["house"] = $dealer->stand();

        } elseif ($status == "SURRENDER") { // if you click on surrender, you,the user, surrender
            echo $player->surrender();  // alleen den echo is om te testen
            $_SESSION["playerSurrender"] = $player->surrender();
        }

        header("Location: http://blackjack.local/form.php"); // maja eerst toch beter de post drukken? het heeft allemaal met die post te doen
    }
}
// a function to clear all sessions for later when i use two pages gebruik die nu nog nie
function allSessionsValueNull(){ // misschien nog typeren en de functie wanneer nodig aanroepen dus
    return $_SESSION["player"] = $_SESSION["house"] =  $_SESSION["playerSurrender"] = 0;
}
?>