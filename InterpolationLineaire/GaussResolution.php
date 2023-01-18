<?php

function MethodeGauss($matrices,$nbre)
{
    for($k=0,$ex=$k+1;$k<=$nbre,$ex<=$nbre;$k++,$ex++)
    {
        for($i=$k+1;$i<=$nbre;$i++)
        {
            if($matrices[$k][$k]==0 && $k!=$nbre)
            {
                $L[$k]=$matrices[$k];
                $matrices[$k]=$matrices[$ex];
                $matrices[$ex]=$L[$k];
            }
            if($matrices[$k][$k]==0)
            {
                echo "Matrice singuliere";
                return;
            }
           $mik=($matrices[$i][$k]/$matrices[$k][$k]);
            for($j=$k;$j<=$nbre+1;$j++)
            {
                $matrices[$i][$j]-=($mik*$matrices[$k][$j]);
            }
            echo "\n";
        }
    }
    AfficherCompletk($matrices,$nbre);
    return ResolutionI($matrices,$nbre);
}


function ResolutionI($matrices,$nbre)
{
    $results[$nbre]=($matrices[$nbre][$nbre+1]/$matrices[$nbre][$nbre]);
    for($i=$nbre-1;$i>=0;$i--)
    {
        $somme=0;
        for($k=$i+1;$k<=$nbre;$k++)
        {
            $somme+=$matrices[$i][$k]*$results[$k];
        }
        $results[$i]=($matrices[$i][$nbre+1]-$somme)/$matrices[$i][$i];
    }
    
    return $results;
}

function Resolution($matrices,$nbre)
{
    $X[0]=($matrices[0][$nbre+1])/$matrices[0][0];

    for($i=1;$i<=$nbre;$i++)
    {
        $Somme=0;
        for($k=0;$k<$i;$k++)
        {
            $Somme+=$matrices[$i][$k]*$X[$k];
        }
        $X[$i]=($matrices[$i][$nbre+1]-$Somme)/$matrices[$i][$i];
    }
    return $X;
}




?>