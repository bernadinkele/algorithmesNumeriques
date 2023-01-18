<?php
require_once "fonction.php";

function PointMilieu($Y,$T,$Nbre,$h)
{

    for($i=1;$i<=$Nbre;$i++)
    {
        $k1=$h*fonction_premier_degre($Y[$i-1],$T[$i-1]);
        $Y[$i]=$Y[$i-1]+$h*(fonction_premier_degre($Y[$i-1]+0.5*$k1,$T[$i-1]+0.5*$h));
        $T[$i]=$T[$i-1]+$h;

        echo  $i."\t".$T[$i]."\t". $Y[$i]."\n";
    }
}


?>