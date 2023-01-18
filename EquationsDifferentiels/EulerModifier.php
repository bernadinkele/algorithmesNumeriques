<?php

require_once "fonction.php";
function EulerModifirer($Y,$T,$nbre,$h)
{
    for($i=1;$i<=$nbre;$i++)
    {
        $k=fonction_premier_degre($Y[$i-1],$T[$i-1]);
        $Y_prime=$Y[$i-1]+($h*$k);
        $Y[$i]=$Y[$i-1]+($h/2)*($k+fonction_premier_degre($Y_prime,$T[$i-1]+$h));
        $T[$i]=$T[$i-1]+$h;
        echo  $i."\t".$T[$i]."\t". $Y[$i]."\n";
    }
}


?>