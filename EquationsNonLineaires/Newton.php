<?php
require_once "Function.php";

function Newton($X0,$precision)
{
    if(fonction_derive($X0)!=0)
    {
                    $X1=$X0-(fonction($X0)/fonction_derive($X0));
                    $amplitude=abs($X1-$X0);
            $i=0;
            while($amplitude>$precision)
            {
                if(fonction($X1)==0)
                {
                    return $X1." est la solution de l'equation\n";
                }
                $X0=$X1;
                if(fonction_derive($X0)!=0)
                {
                    $X1=$X0-(fonction($X0)/fonction_derive($X0));
                }else
                {
                    return $X1." est la solution de l'equation\n";
                }
                $amplitude=abs($X1-$X0);
            }

            return $X1." est la solution de l'equation\n";
    }else
    {
        return "impossible car la fonction n'est pas derivalbe";
    }

}
?>