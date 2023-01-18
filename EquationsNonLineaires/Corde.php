<?php
require_once "Function.php";

function Corde($X0,$X1,$precision)
{
    $X2=$X1-((fonction($X1)*($X1-$X0))/(fonction($X1)-fonction($X0)));
    $amplitude=abs($X2-$X1);
    while($amplitude>$precision)
    {
        if(fonction($X2)==0)
                {
                   return $X2." est la solution de l'equation\n";

                }
                $X1=$X2;
                $X2=$X1-((fonction($X1)*($X1-$X0))/(fonction($X1)-fonction($X0)));
                $amplitude=abs($X2-$X1);
    }
     return $X2." est la solution de l'equation\n";

}


?>