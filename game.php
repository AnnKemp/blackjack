<?php
declare(strict_types=1);
ini_set('display_errors', "1"); // om foutmeldingen te tonen
session_start();

// Set session variables
$_SESSION["player"] = 0;
$_SESSION["house"] = 0;
echo "Session variables are set.";

//if ($_SERVER["REQUEST_METHOD"] == "GET"){} dan de get-waarde er uit halen

//if (!empty($_GET)) {
//$status=$_GET['status];
// if ($status=="HIT"){}  if ($status=="STAND"){}   if ($status=="SURRENDER"){}

class Blackjack{

    // initiate variables
    //$score=0;

    function Hit()
    {
        // schrijfwijze checken!
       // $this score+=$lay_card=mt_rand(1,11);
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

