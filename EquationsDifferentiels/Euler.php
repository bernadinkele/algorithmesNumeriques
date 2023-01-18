<?php
require_once "fonction.php";

function Euler($T,$Y,$nbre,$h)
{
    for($i=1;$i<=$nbre;$i++)
    {
        $k=fonction_premier_degre($Y[$i-1],$T[$i-1]);
        $Y[$i]=$Y[$i-1]+($h*$k);
        $T[$i]=$T[$i-1]+$h;
        echo  $i."\t".$T[$i]."\t". $Y[$i]."\n";
    }

}




?>