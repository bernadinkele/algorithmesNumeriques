<?php

require_once "fonction.php";

function RungeKutta($Y,$T,$nbre,$h)
{
    for($i=1;$i<=$nbre;$i++)
    {
        $k1=$h*fonction_premier_degre($Y[$i-1],$T[$i-1]);
        $k2=$h*fonction_premier_degre($Y[$i-1]+0.5*$k1,$T[$i-1]+0.5*$h);
        $k3=$h*fonction_premier_degre($Y[$i-1]+0.5*$k2,$T[$i-1]+0.5*$h);
        $k4=$h*fonction_premier_degre($Y[$i-1]+$k3,$T[$i-1]+$h);
        $Y[$i]=$Y[$i-1]+(($k1+2*$k2+2*$k3+$k4)/6);
        $T[$i]=$T[$i-1]+$h;
        echo  $i."\t".$T[$i]."\t". $Y[$i]."\n";
    }
}


?>