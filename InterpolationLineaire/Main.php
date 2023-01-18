<?php
require_once "Afficher.php";
require_once "Lagrande.php";
require_once "Newton.php";
require_once "MoindreCrre.php";
require_once "VanderMonde.php";
require_once "Controle.php";
echo "--------------------------------------------------------------------------------------------------------\n";

echo "\n\n\t\t\tPROGRAMME D'INTERPOLATION LINEAIRE\n\n";
echo "--------------------------------------------------------------------------------------------------------\n\n";

$nbre=ControleSaisi("Entrer le nombre N de dimensions: ");
$X=[];
$Y=[];

for($i=0;$i<=$nbre;$i++)
{
  
    $X[$i]=ControleSaisi("X".$i.":");
    $Y[$i]=ControleSaisi("Y".$i.":");
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