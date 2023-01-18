<?php

function CalculErreurMax($X,$Xi,$nbre)
{
    $erreurs=[];
    for($i=1;$i<=$nbre;$i++)
    {
        $erreurs[$i]=abs($X[$i]-$Xi[$i]);
    }
   return max($erreurs);
}

function CalculErreurMin($X,$Xi,$nbre)
{
    $erreurs=[];
    for($i=1;$i<=$nbre;$i++)
    {
        $erreurs[$i]=abs($X[$i]-$Xi[$i]);
    }
   return min($erreurs);
}



function calculSomme($F,$E,$nbre)
{
    $EplusF=[];
    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            $EplusF[$i][$j]=$E[$i][$j]+$F[$i][$j];
        }
    }
    return $EplusF;
}

function InitialisationD($matrices,$nbre)
{
    $D=[];
    for($i=1;$i<=$nbre;$i++)
    {
       $D[$i][$i]=$matrices[$i][$i];
        for($j=0;$j<=$nbre;$j++)
        {
           if($j!=$i)
           {
            
            $D[$i][$j]=0;
           }
        }
    }
    return $D;
}



function Troncature($resultats,$nbre,$erreur)
{
    $chiffre=pow($erreur,-1);
    $results=[];
    
    for($i=1;$i<=$nbre;$i++)
    {
         $tronc =(int)($resultats[$i]*$chiffre)/$chiffre;
         $results[$i]= $tronc;
    }
    return $results;
}

function Permutation($matrices,$nbre)
{
    for($i=1,$end=$i+1;$i<=$nbre,$end<=$nbre;$i++,$end++)
    {
        $somme=0;
        for($j=1;$j<=$nbre;$j++)
        {
            if($j!=$i)
            {
                $somme+=abs($matrices[$i][$j]);
            }
        }
        if(abs($matrices[$i][$i])<$somme)
        {
             $L[$i]=$matrices[$i];
            $matrices[$i]=$matrices[$end];
            $matrices[$end]=$L[$i];
        }
    }
     return $matrices;
}


function ControleDominante($matrices,$nbre)
{
    $actif=0;
    for($i=1;$i<=$nbre;$i++)
    {
        $somme=0;
        for($j=1;$j<=$nbre;$j++)
        {
            if($j!=$i)
            {
                $somme+=abs($matrices[$i][$j]);
            }
        }
        if(abs($matrices[$i][$i])>=$somme)
        {
            $actif++;
        }
    }
    
    return $actif;
}





?>