<?php
require_once "Afficher.php";   
require_once "GaussResolution.php"; 
function Newton($X,$Y,$nbre)
{
    $matrices=[];

    for($i=0;$i<=$nbre;$i++)
    {
        $matrices[$i][0]=1;

        for($j=1;$j<=$nbre;$j++)
        {
            if($j>$i)
            {
                $matrices[$i][$j]=0;
            }
        }
    }
    
    for($i=0;$i<=$nbre;$i++)
    {
        $colones=[];
        $colones[0]=1;
        for($j=1;$j<=$nbre;$j++)
        {
            if($j<=$i)
            {
                $produit=1;
                for($k=0;$k<$j;$k++)
                {
                   // $produit*=$colones[$k];
                   $produit*=$X[$i]-$X[$k];
                }
                
                //$colones[$j]=($X[$i]-$X[$j-1])*$produit;
                $matrices[$i][$j]=$produit;
               
            }
        }
    }

    for($i=0;$i<=$nbre;$i++)
    {
        $matrices[$i][$nbre+1]=$Y[$i];
    }
    AfficherCompletk($matrices,$nbre);
   
   $coeff=Resolution($matrices,$nbre);

   $N=fonction($X,$nbre);
   P_x($coeff,$N,$nbre);
}

function fonction($X,$nbre)
{
    $N=[];
    $N[0]="";
    for($i=1;$i<=$nbre;$i++)
    {
        $_X="";
        for($k=0;$k<$i;$k++)
        {
            $_X.="(x-".$X[$k].")";
        }
       
        $N[$i]=$_X;
    }

    return $N;
}

function P_x($coeff,$N,$nbre)
{
    $P_X="";
    for($i=0;$i<=$nbre;$i++)
    {
            $coef=$coeff[$i];
           if($i!=$nbre)
           {
            $P_X.="($coef)".$N[$i]."+";
           }else
           {
            $P_X.="($coef)".$N[$i]."";
           }
    }
   
    echo $P_X;
}






?>