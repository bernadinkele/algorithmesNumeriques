<?php
require_once "Afficher.php";
require_once "Lagrande.php";
require_once "Newton.php";
require_once "MoindreCrre.php";
require_once "VanderMonde.php";
require_once "fonction.php";
require_once "Controle.php";
echo "--------------------------------------------------------------------------------------------------------\n";

echo "\n\n\t\t\tPROGRAMME D'INTERPOLATION LINEAIRE\n\n";
echo "--------------------------------------------------------------------------------------------------------\n\n";

$nbre=ControleSaisi("Entrer le nombre N de dimensions: ");
$X=[];
$Y=[];

for($i=0;$i<=$nbre;$i++)
{
   if($i>0)
    {
        for($k=0;$k<$i;$k++)
        {
            do{
                $X[$i]=ControleSaisi("X".$i.":");
                if($X[$i]==$X[$k])
                {
                    echo "\nVous avez deja saisie ce nombre\n";
                }
            }while($X[$i]==$X[$k]);
        }
    }else
    {
        $X[$i]=ControleSaisi("X".$i.":");
        $Y[$i]=fonctionf($X[$i]);
    }
   
}



echo "\n-----------------------Lagrande------------------\n";
Lagrande($X,$Y,$nbre);
echo "\n-----------------------Newton------------------\n";
Newton($X,$Y,$nbre);
echo "\n-----------------------MoindreCarre------------------\n";
MoindreCarre($X,$Y,$nbre);
echo "\n-----------------------Vandermonde------------------\n";
VanderMonde($X,$Y,$nbre)






?>