<?php
declare(strict_types=1);
ini_set('display_errors', "1"); // om foutmeldingen te tonen

// Set session variables
//session_start(); we have already a session started
$_SESSION["player"]=0;
$_SESSION["house"]=0;

//initializing vars
$status="";
//if (!empty($_GET)) {

// if ($status=="HIT"){}  if ($status=="STAND"){}   if ($status=="SURRENDER"){}

class Blackjack{

    // Properties
     public $score;
    // Set session variables
     public $player=0;

    // Methods
    // this is the set-functione
    public function hit() // dit stuk werkt maar nu nog het eruit krijgen in een session, da's wat anders!
    { // set the score
        $this->score=mt_rand(1,11);
        // for two cards instead of one (you have pull two cards at once)
        $this->player=$this->score+=mt_rand(1,11);
        return $this->player;
         //return $this->score;  // this works to get the score out of the class // not yet -> when you call the hit- method of the object player
    }
    // this is the get-function // display the scores
     public function stand($player,$value){ // ik weet nog niet of die parameters ok zijn
       // $_SESSION["player"] = $this->player;         // put the result of the score into a $_SESSION
        //return $_SESSION["player"];
      //  var_dump($_SESSION["player"]);
       // echo "Session variables are set.";
        //return $this->score;  // get the score
      }
    function surrender(){
        echo "The house has won!";
        // show total/score dealer
    }
}
$player=new Blackjack();
$dealer=new Blackjack();

//dit hieronder kan niet echt omdat addSession momenteel geen aparte class is
//$Se = new addSession();
//echo $Se->addSession($player,$value);

//Double check here !!
//echo $_SESSION['player'];
//$_SESSION[$player]=0;
//$_SESSION[$house]=0;

// hieronder code voorbeeld
//$apple = new Fruit();
//$apple->set_name('Apple'); // functie set_name aanroepen met de waarde Apple die geset moet worden
//echo $apple->get_name(); // functie get_name aanroepen om de gereturnde waarde terug te vragen en te echoöen

//echo $player->hit(); // calls the return value and this works but only on this page, the game-page where I don't want to show this values
//$_SESSION["player"] = $player->hit(); // this works

//echo $player->stand(); // dit werkt niet, heeft het te maken met public of private? normaal volgens het voorbeeld zonder public of private zou ik dat in hetzelfde object zonder problemen van de ene functie in de andere functie via $this moeten kunnen oproepen
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $status=$_GET['status'];

    if ($status=="HIT"){
        echo "<H3>Your score is : ".$player->hit()."</H3>";
  //$_SESSION["player"] = $player->hit(); // dit werkt maar ik zou het toewijzen aan de $_SESSION liever in de set-functie doen de stand() functie vanwaaruit ik ook wil returnen maar dat lukt nu nog niet
    }elseif($status=="STAND"){
        echo $status;
        $player->stand();
    }elseif($status=="SURRENDER"){
        echo $status;
        $player->surrender();
    }
}
/*
<?php
    class sessionControle{
        ...
        ...
        public function addSession($index, $value){
            $_SESSION[$index] = $value;
            return $_SESSION[$index];
        }
    }
?>
in your main php file you can include the function $_SESSIONS are global Code in your main file:

<?php
    session_start();
    include_once("myClass.php");
    $Se = new sessionControle;
    echo $Se->addSession('User', 'Crx');

    //Double check here !!
    echo $_SESSION['User'];
?>
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

require 'home.php';  // misschien is het werken met deze ook handig
?>

