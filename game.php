<?php
session_start();

// Set session variables
$_SESSION["player"] = 0;
$_SESSION["house"] = 0;
echo "Session variables are set.";

class Blackjack{

    $score=0;

    function Hit(){
        $this score+=$lay_card=mt_rand(1,11);
    }

    function Stand(){
        $_SESSION["player"] = 0;
        echo "Session variables are set.";
    }

    function Surrender(){
        echo "The house has won!";
        // show total dealer
    }
}

$player=new Blackjack();
$dealer=new Blackjack();
?>

