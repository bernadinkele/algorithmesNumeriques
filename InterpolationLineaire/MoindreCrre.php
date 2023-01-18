<?php
require_once "Afficher.php";
require_once "GaussResolution.php";
function MoindreCarre($X,$Y,$nbre)
{
    $p=$nbre;
    $matrices=[];
    for($ligne=0,$exp=2*$p;$ligne<=$p,$exp>=$p;$ligne++,$exp--)
    {
        for($j=0,$ex=$exp;$j<=$p,$ex>=0;$j++,$ex--)
        {
            $somme=0;
            for($i=0;$i<=$nbre;$i++)
            {
                $somme+=pow($X[$i],$ex);
            }
            $matrices[$ligne][$j]=$somme;
        }
    }

   for($ligne=0,$exp=$p;$ligne<=$p,$exp>=0;$ligne++,$exp--)
   {
        $somme=0;
        for($i=0;$i<=$nbre;$i++)
        {
            $somme+=pow($X[$i],$exp)*$Y[$i];
        }
    $matrices[$ligne][$p+1]=$somme;
   }
   AfficherCompletk($matrices,$p);
   $coeff=MethodeGauss($matrices,$p);
   fonct_pm($coeff,$p);
}

function fonct_pm($coeff,$nbre)
{
        $P_X="";
        for($i=0,$exp=$nbre;$exp>=0,$i<=$nbre;$i++,$exp--)
        {
                $X="";
                for($k=1;$k<=$i;$k++)
                {
                       if($k!=$i)
                       {
                        $X.="x*";
                       }else
                       {
                        $X.="x";
                       }
                }
                $coef=$coeff[$exp];
               if($i!=$nbre)
               {
                $P_X.="($coef)".$X."+";
               }else
               {
                $P_X.="($coef)".$X."";
               }
        }
       
        echo $P_X;
}



?>