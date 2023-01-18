<?php
require_once "Function.php";

function Dichotomie($a,$b,$erreur)
{
    $Xm=($a+$b)/2;
    $amplitude=4;

    while($amplitude>$erreur)
    {
        if(fonction($a)==0)
        {
           return $a." est une solution de l'equation\n";
        }
        if(fonction($b)==0)
        {
            return $b." est une solution de l'equation\n";
        }
        if(fonction($Xm)==0)
        {
            return $Xm." est une solution de l'equation\n";
        }

        //echo "\n".$a."\t".$b."\t".$Xm."\t".fonction($a)."\t".fonction($b)."\t".fonction($Xm)."\n";

        if(fonction($a)*fonction($Xm)<0)
        {
            $b=$Xm;
        }else
        {
            $a=$Xm;
        }
        $Xm=($a+$b)/2;
        $amplitude=abs($b-$a);
    }
    return (($a+$b)/2)." est une solution de l'equation\n";
}


?>