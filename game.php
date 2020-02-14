<?php
//declare(strict_types=1);
//ini_set('display_errors', "1"); // om foutmeldingen te tonen
// Set session variables
session_start();

//initializing vars
$status="";

class Blackjack{

    // Properties
    // set score user
     public $score=0;
     // set score house
     public $houseScore=0;

    // Methods
    // this is the set-function
    public function hit()
    { // set the score for the user // it was first the general set function
        $this->score=mt_rand(1,11);
        $this->score+=mt_rand(1,11); // to lay a card and add to the rest

        if($this->score > 21) {  // so is the number is bigger than 21 you lose
            return "You lose! Your score is: " .$this->score;
           // allSessionsValueNull();//to put the session to zero, have to put a timer on it
        }
        if((isset($this->houseScore))&&($this->houseScore!=0)){

             if(($this->score < 21)&&($this->score > $this->houseScore)){
                  return "You lose! Your score is: " .$this->score."de huisscore: ".$this->houseScore;
                 // allSessionsValueNull();//to put the session to zero, have to put a timer on it
                }
        // uitzoeken hoe ik die houseScore uit de function stand() krijg
             elseif(($this->score < 21)&&($this->score > $this->houseScore)){  // so is the number is bigger than 21 you lose
                   return "You WIN! :) Your score is: ".$this->score."and the score of the house is: ".$this->houseScore;
                 // allSessionsValueNull();//to put the session to zero, have to put a timer on it
              }
             elseif($this->score == $this->houseScore){
                return "The house WINS! :) Your score is: ".$this->score."and the score of the house is: ".$this->houseScore;
                 // allSessionsValueNull();//to put the session to zero, have to put a timer on it
            }
        }else {
            return "Your score is : " . $this->score . "<br />"; //."de waarde van ".$this->houseScore." is";// of $this->score;
             }
        }
    // this was the get-function // display the scores
    // now it displays the house scores
     public function stand(){ // ik weet nog niet of die parameters ok zijn
         $this->houseScore=mt_rand(1,11);
         if($this->houseScore < 15) {
             $this->houseScore=$this->houseScore+mt_rand(1,11);
         }
         if($this->houseScore > 21){
             return "The stand of the house is: ".$this->houseScore." The house loses!<br/><H1>YOU HAVE WON!</H1>";
         }
         else {
             return "The stand of the house is: ".$this->houseScore;
         }
      }
      public function surrender(){

          return "The house has won!<br />"."<H1>GAME OVER!</H1>".$this->houseScore;// score dealer // den deze na het eten testen
          // allSessionsValueNull();//to put the session to zero, have to put a timer on it
    }
}
// making the object
if(!isset($player)){ // omdat het leek bij het tellen alsof het object elke keer opnieuw werd aangemaakt

$player=new Blackjack();

}

//$dealer=new Blackjack(); // I am not using $dealer at the moment

// hieronder code voorbeeld hoe er normaal gewerkt wordt
//$apple = new Fruit();
//$apple->set_name('Apple'); // functie set_name aanroepen met de waarde Apple die geset moet worden
//echo $apple->get_name(); // functie get_name aanroepen om de gereturnde waarde terug te vragen en te echoöen

//$_SESSION["player"] = $player->hit(); // this works


if($_SERVER["REQUEST_METHOD"] == "POST") {   // if($_POST['submit']) {echo "yeah baby, it's a submit!"; }
} // elke keer als er zo'n GET-Knop geklikt wordt zie je in de url wél die post opnieuw verschijnen
if (!empty($_GET)) {
    $status = $_GET['status'];

    if ($status == "HIT") {
        //echo $status;
        //echo "<H3>Your score is : " . $player->hit() . "</H3>"; // this works! :)
        $_SESSION["player"] = $player->hit();
        //print_r($_SESSION["player"]); // to test the code

    } elseif ($status == "STAND") {
       //echo $status;
        //echo "stand of the house is: ".$player->stand();
        $_SESSION["house"]=$player->stand();
        //print_r($_SESSION["house"]); // to test the code

    } elseif ($status == "SURRENDER") {
        $_SESSION["playerSurrender"]=$player->surrender();
    }
}

function allSessionsValueNull(){ // misschien nog typeren en de functie wanneer nodig aanroepen dus
    return $_SESSION["player"] = $_SESSION["house"] =  $_SESSION["playerSurrender"] = 0;
}
/*

    class sessionControle{
        ...
        ...
        public function addSession($index, $value){
            $_SESSION[$index] = $value;
            return $_SESSION[$index];
        }
    }

in your main php file you can include the function $_SESSIONS are global Code in your main file:


    session_start();
    include_once("myClass.php");
    $Se = new sessionControle;
    echo $Se->addSession('User', 'Crx');

    //Double check here !!
    echo $_SESSION['User'];

*/
//----------------------------------------------------------------------------------------------------------------------------------------------------------------------
/*class SessionManager
{
    public function __construct()
    {
        session_start();   //We must start the session before using it.
    }

    //This will set a value in the session.
    public function setValue($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    //This will return a value from the session
    public function getValue($key)
    {
        return $_SESSION[$key];
    }

    public function printValue($key)
    {
        print($_SESSION[$key]);
    }
}
Once we have a class to manage it a few things happen. We can use this new class to add info to the session and also to retrieve it.

Consider the following code:

$session = new SessionManager();
$session->setValue('Car', 'Honda');

echo $session->getValue('Car'); // This prints the word "Honda" to the screen.
echo $_SESSION['Car']; //This also prints the word "Honda" to the screen.
$session->printValue('Car'); //Again, "Honda" is printed to the screen.*/

require 'home.php';  // met deze werken mag deze keer niet  moet nog een oplossing vinden zonder deze . . . mmm
?>

