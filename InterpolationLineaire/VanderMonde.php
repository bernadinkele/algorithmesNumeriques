<?php
require_once "Afficher.php";
require_once "GaussResolution.php";
function VanderMonde($X,$Y,$nbre)
{
    $matrices=[];

    for($i=0;$i<=$nbre;$i++)
    {
          for($j=0,$exp=$nbre;$j<=$nbre,$exp>=0;$j++,$exp--)
            {
                    $matrices[$i][$j]=pow($X[$i],$exp);
            }
            $matrices[$i][$nbre+1]=$Y[$i];
    }

    AfficherCompletk($matrices,$nbre);
    $coeff=MethodeGauss($matrices,$nbre);
    fonct_p($coeff,$nbre);
}

function fonct_p($coeff,$nbre)
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