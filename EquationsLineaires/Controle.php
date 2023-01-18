<?php

function ControleSaisi(String $phrase)
{
    do
    {
        $nbre=readline($phrase);
        if($nbre==" "|| !is_numeric($nbre))
        {
            echo "\nVotre saisie n'est pas compatible:\n";
        }
    }while($nbre==" "|| !is_numeric($nbre));
    return $nbre;
}

function MatriceTridiagonale($matrices,$nbre)
{
    $max=3*$nbre-2;
    $actif=0;
    $zero=0;
    $maxzero=(pow($nbre,2)-$max);
    for($i=1;$i<=$nbre;$i++)
    {
        if($matrices[$i][$i]!=0)
        {
            $actif++;
        }
       
        if($i<$nbre)
        {
            if($matrices[$i][$i+1]!=0)
            {
                $actif++;
            }
            
        }
       if($i>1)
        {
            if($matrices[$i][$i-1]!=0)
            {
                $actif++;
            }
       }

       for($j=1;$j<=$nbre;$j++)
       {
         if($j!=$i && $j!=$i+1 && $j!=$i-1)
         {
            if($matrices[$i][$j]==0)
            {
                $zero++;
            }
           
         }
       }
      
    }
    if($actif==$max &&  $zero==$maxzero)
    {
      return true;
    }else
    {
      return false;
    }
}






function Permut($matrices,$a,$b,$nbre)
{
    for($i=1;$i<=$nbre;$i++)
    {
        $L=$matrices[$a];
        $matrices[$a]=$matrices[$b];
        $matrices[$b]=$L;
    }
    return $matrices;
}

?>