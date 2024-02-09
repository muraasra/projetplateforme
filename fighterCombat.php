
<?php
// crealtion de classe robot qui va prendre le nom du robot et initialise le nombre de point de vie
class Robot
{
    public $robotName;
    public $robotLife;
     // constructeur de la classe robot 
    public function __construct($robotName)
    {
    $this->robotName = $robotName;
    $this->robotLife= 10;
    }
        //methode ou l'un des robot va attaquer l'autre robot et il va perdre toujours 2 point de vie 
    public function fire(Robot $robotUse)
    {
        $robotUse->robotLife -=2 ;
         
        echo "Fighter $this->robotName a touché le combatant Fighter $robotUse->robotName  qui a maintenant $robotUse->robotLife points !          <br> \n" ;
    }// methode pour verifier si un robot est mort 
    public function isDead()
    {  $checkDead = false;
        if ( $this->robotLife <= 0)
        $checkDead = true;
 return $checkDead;
    }
        // methode pour afficher robot aavant le nom du robot a chaque  fois qu un robot est appele 
    public function __toString()
    {
            return "Fighter $this->robotName \n";
    }
}
// classe arena pour realiser le combat proprement dit entre les robot
class Arena
{
    // methode pour realiser le combat
public function fight(Robot $robot1, Fighter $robot2)
    {    // combat
        while (!$robot1->isDead() && !$robot2->isDead()) {
        
            $robot1->fire($robot2);
            if (!$robot2->isDead()) {
                $robot2->fire($robot1);
            }
        }
            // verification du robot mort 
        if ($robot1->isDead()) {
            return $robot2;
        } else {
            return $robot1;
        }
    }
}


class Fighter extends Robot
{
    

    public function __construct($robotName, $seed)
    {
        parent::__construct($robotName);
       
    }
// cette methode verifie si l'humain va toucher sa cible et sil la touche elle la renvoie a la methode fire dess robot
    public function fire(Robot $robotUse)
    {
        if (random_int(1,2)==1) {
            parent::fire($robotUse);
        } else {
            echo "Fighter $this->robotName a raté sa cible et concerve ses $this->robotLife points  !<br> \n ";
        }
    }

    public function __toString()
    {
        return "Fighter $this->robotName";
    }
}

// Combat entre D2R2 et Data

$Humain1 = new Fighter("1",2); $Humain2 = new Fighter("2",2);

 $robotArena = new Arena();
$robotWin = $robotArena->fight($Humain1, $Humain2);


echo "Le gagnant du Combat est : $robotWin \n";
 
exit
?>

