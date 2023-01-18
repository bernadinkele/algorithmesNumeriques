<?php
require_once "Resolution.php";
require_once "Afficher.php";
function Cholesky($matrices,$nbre)
{
    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            if($matrices[$i][$j]!=$matrices[$j][$i])
            {
                echo "\nMatrice non Symetrique , donc la methode de Cholesky ne peut pas trouver la solution\n\n";
                return;
            }
        }
    }

    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            $L[$i][$j]=0;
        }

    }

    for($i=1;$i<=$nbre;$i++)
    {
        $Somme=0;
        for($k=1;$k<=$i;$k++)
        {
            $Somme+=pow($L[$i][$k],2);
        }
        $P=$matrices[$i][$i]-$Somme;

        if($P<=0)
        {
            echo "\nMatrice non Positive , donc la methode de Cholesky ne peut pas trouver la solution\n\n";
            return;
        }
        $L[$i][$i]=sqrt($P);

        for($j=$i+1;$j<=$nbre;$j++)
        {
            $Somme=0;
            for($k=1;$k<=$i;$k++)
            {
                $Somme+=$L[$i][$k]*$L[$j][$k];
            }
            $L[$j][$i]=($matrices[$j][$i]-$Somme)/$L[$i][$i];
        }

    }

    $tL=[];

    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            $tL[$i][$j]=$L[$j][$i];
        }
    }
    AfficherDecomposition($matrices,$L,$tL,$nbre);
    ResolutionMatricesLU($matrices,$L,$tL,$nbre);
}



?>