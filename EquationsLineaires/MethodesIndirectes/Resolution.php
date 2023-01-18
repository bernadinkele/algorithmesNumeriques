<?php

function Resolution($EplusF,$X,$nbre)
{
    $ResultatsExacts=[];
    for($i=1;$i<=$nbre;$i++)
    {
       $somme=0;
        for($j=1;$j<=$nbre;$j++)
        {
            $somme+=$EplusF[$i][$j]*$X[$j];
        }
        $ResultatsExacts[$i]=$somme;
    }
   return $ResultatsExacts;
}





?>