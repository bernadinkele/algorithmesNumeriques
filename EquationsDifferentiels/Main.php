<?php

use JetBrains\PhpStorm\Language;

require_once "fonction.php";
require_once "EulerModifier.php";
require_once "Euler.php";
require_once "PointMillieu.php";
require_once "RungeKuttaOrdre4.php";
require_once "InterpolationLineaire/Lagrande.php";
echo "---------------------\tPROGRAMME D'EQUATION DIFFERENTIELLE---------------";

$nbre=readline("Entrer le nombre N d'iterations: ");
$h=readline("Entrer le nombre de pas h: ");
$T[0]=readline("vueillez donner le to: ");
$Y[0]=readline("Donnez le y0 : ");

echo "\n\n------------Euler-------------------------\n\n";
Euler($T,$Y,$nbre,$h);
echo "\n\n------------EulerModifier-------------------------\n\n";
EulerModifirer($Y,$T,$nbre,$h);
echo "\n\n------------PointMilieu-------------------------\n\n";
PointMilieu($Y,$T,$nbre,$h);
echo "\n\n------------RungeKutta ORdre 4-------------------------\n\n";
RungeKutta($Y,$T,$nbre,$h);
Lagrande($T,$Y,$nbre);





?>