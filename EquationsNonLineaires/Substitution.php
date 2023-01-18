<?php
require_once "Function.php";
function Substitution($X0,$precision)
{
    $X1=fonctionG($X0);
    $amplitude=4;
    while($amplitude>$precision)
    {
        if(fonction($X1==0))
        {
            return $X1." est la solution de l'equation \n";
        }
    $X0=$X1;
    $X1=fonctionG($X0);
    $amplitude=abs($X1-$X0);
    }
    return $X1." est la solution de l'equation \n";
}

?>