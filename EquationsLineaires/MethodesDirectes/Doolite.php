<?php
require_once "Afficher.php";
require_once "Resolution.php";

function MethodeDoolite($matrices,$nbre)
{
    $L=[];

    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            if($j>$i)
            {
                $L[$i][$j]=0;
            }elseif($j==$i)
            {
                $L[$i][$j]=1;
            }
        }
    }
    $U=[];
    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            if($j<$i)
            {
                $U[$i][$j]=0;
            }
        }
    }
    for($i=1;$i<$nbre;$i++)
    {
        for($j=$i;$j<=$nbre;$j++)
        {
            $somme=0;
            for($k=1;$k<$i;$k++)
            {
                $somme+=$L[$i][$k]*$U[$k][$j];
            }
            $U[$i][$j]=$matrices[$i][$j]-$somme;
        }

        for($j=$i+1;$j<=$nbre;$j++)
        {
            $somme=0;
            for($k=1;$k<$i;$k++)
            {
                $somme+=$L[$j][$k]*$U[$k][$i];
            }
            if($U[$i][$i]==0)
            {
                echo "\nImpossible d'utiliser la methode de Doolite ,pour la resolution de cette equation\n\n";
                return;
            }
            $L[$j][$i]=($matrices[$j][$i]-$somme)/$U[$i][$i];
        }
    }

             $somme=0;
            for($k=1;$k<$nbre;$k++)
            {
                $somme+=$L[$nbre][$k]*$U[$k][$nbre];
            }
    $U[$nbre][$nbre]=$matrices[$nbre][$nbre]-$somme;
    AfficherDecomposition($matrices,$L,$U,$nbre);
    ResolutionMatricesLU($matrices,$L,$U,$nbre);
}

?>