<?php
require_once "Controle.php";
require_once "Afficher.php";
function ResolutionTriangulaireSuperieur($matrices,$nbre)
{
    if(verify($matrices,$nbre)!=0)
    {
            $results=[];
            $results[0]=0;
            for($i=1;$i<=$nbre;$i++)
            {
                $somme=0;
                for($k=1;$k<$i;$k++)
                {
                    $somme+=$matrices[$i][$k]*$results[$k];
                }
                $results[$i]=($matrices[$i][$nbre+1]-$somme)/$matrices[$i][$i];
            }
    }else
    {
        $results=0;
    }

     return $results;
 }

 function ResolutionTriangulaireInferieur($matrices,$nbre)
 {
    if(verify($matrices,$nbre)!=0)
    { 
            $results=[];
            $results[0]=0;
            for($i=$nbre, $index=0;$i>=1;$i--, $index++)
            {
                $somme=0;
                for($k=$i+1,$ind=$index;$k<=$nbre,$ind>=1;$k++,$ind--)
                {
                    $constant=$matrices[$i][$k];
                    $somme+=$constant*$results[$ind];
                }
                $results[$index+1]=($matrices[$i][$nbre+1]-$somme)/$matrices[$i][$i];
            }
    }else
    {
        $results=0;
    }
    
    return $results;
 }




function ResolutionMatricesLU($matrices,$L,$U,$nbre)
{
    for($i=1;$i<=$nbre;$i++)
    {
        $L[$i][$nbre+1]=$matrices[$i][$nbre+1];
    }
    $solutionY=ResolutionTriangulaireSuperieur($L,$nbre);
   if(is_array($solutionY))
   {
    echo "\nLes solutions de LY=B\n\n";
     
    foreach($solutionY as$index=> $solution)
    {
        if($index!=0)
        {
            echo "Y".$index.": ".$solution."\n";
        }
        }
        for($i=1;$i<=$nbre;$i++)
        {
            $U[$i][$nbre+1]=$solutionY[$i];
        }
        $X= ResolutionTriangulaireInferieur($U,$nbre);
        if(is_array($X))
        {
            echo "\nLes solutions de UX=Y\n\n";
            ResutatInferior($X,$nbre);
        }else
        {
            echo "Impossible de resoudre Avec cette Methode\n\n";
        }
   }else
   {
    echo "Impossible de resoudre Avec cette Methode\n\n";
   }
   
}




function verifyTriangulaireInferieur($matrices,$nbre)
{
    $verif=0;
    $nbreofZero=(pow($nbre,2)-$nbre)/2;
    for($i=1;$i<=$nbre;$i++)
    {
        $pivot=$matrices[$i][$i];
        for($j=1;$j<=$nbre;$j++)
        {
            if($i<$j)
            {
                if(($matrices[$i][$j]==0) &&  $pivot!=0)
                {
                    $verif++;
                }
            }
        }
    }
   return $verif;       
}

function verifyTriangulaireSuperieur($matrices,$nbre)
{
    $verif=0;
    $nbreofZero=(pow($nbre,2)-$nbre)/2;
    for($i=1;$i<=$nbre;$i++)
    {
        $pivot=$matrices[$i][$i];
        for($j=1;$j<=$nbre;$j++)
        {
            if($i>$j)
            {
                if(($matrices[$i][$j]==0) &&  $pivot!=0)
                {
                    $verif++;
                }
            }
        }
    }
   return $verif;   
}


function verify($matrices,$nbre)
{
    for($i=1;$i<=$nbre;$i++)
    {
        if($matrices[$i][$i]==0)
        {
            return 0;
        }
    }
    return 1;
}














?>