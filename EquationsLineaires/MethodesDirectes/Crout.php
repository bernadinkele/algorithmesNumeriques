<?php
require_once "Resolution.php";
require_once "Afficher.php";
function Crout($matrices,$nbre)
{
 
    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            if($j>$i)
            {
                $L[$i][$j]=0;
            }
        }
    }
    
  
    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
           
            if($j==$i)
            {
                $U[$i][$j]=1;
            }elseif($j<$i)
            {
                $U[$i][$j]=0;
            }
        }
    }

  
    for($i=1;$i<=$nbre;$i++)
    {
        $L[$i][1]=$matrices[$i][1];
    }
   
    for($i=2;$i<=$nbre;$i++)
    {
        $U[1][$i]=$matrices[1][$i]/$L[1][1];
    }

   
    for($i=2;$i<=$nbre;$i++)
    {
    
        $somme=0;
        for($k=1;$k<$i;$k++)
        {
           $somme+=$L[$i][$k]*$U[$k][$i];
        }
        $L[$i][$i]=$matrices[$i][$i]-$somme;

        for($j=$i+1;$j<=$nbre;$j++)
        {
           $somme1=0;
            for($k=1;$k<$i;$k++)
            {
                $somme1+=$L[$j][$k]*$U[$k][$i]; 
            }
            $L[$j][$i]=$matrices[$j][$i]-$somme1;

            
            $somme2=0;
            for($k=1;$k<$i;$k++)
            {
                $somme2+=$L[$i][$k]*$U[$k][$j];
            } 
            if($L[$i][$i]==0)
            {
                echo "\nImpossible d'Utiliser la methode de crout pour la resolution de cette equation\n";
                return;
            }
            $U[$i][$j]=($matrices[$i][$j]-$somme2)/$L[$i][$i];
          
        }
        $somme3=0;
        for($k=1;$k<$nbre;$k++)
        {
                $somme3+=$L[$nbre][$k]*$U[$k][$nbre];
        }
      
        $L[$nbre][$nbre]=$matrices[$nbre][$nbre]-$somme3;
    }
   
  AfficherDecomposition($matrices,$L,$U,$nbre);
    
  ResolutionMatricesLU($matrices,$L,$U,$nbre);
}

?>