

<?php


// creqtion de classe robot qui va prendre le nom du robot et initialise le nombre de point de vie
class Robot
{
    private $robotName;
    private $robotLife;
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
         
        echo "Robot $this->robotName a touché le Robot $robotUse->robotName aui a maintenant $this->robotLife ! \n" ;
    }
        // methode pour verifier si un robot est mort 
    public function isDead()
    {  $checkDead = false;
        if ( $this->robotLife <= 0)
        $checkDead = true;
 return $checkDead;
    }
        // methode pour afficher robot aavant le nom du robot a chaque  fois qu un robot est appele 
    public function __toString()
    {
            return "Robot $this->robotName \n";
    }
}
// classe arena pour realiser le combat proprement dit entre les robot
class Arena
{
    // methode pour realiser le combat
public function fight(Robot $robot1, Robot $robot2)
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

// Combat entre D2R2 et Data
$D2R2 = new Robot("D2R2"); $Data = new Robot("Data");

 $robotArena = new Arena();
$robotWin = $robotArena->fight($D2R2, $Data);


echo "Le vainqueur du combat est : $robotWin \n";

exit;
?>
