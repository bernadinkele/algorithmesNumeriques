<?php

function Thomas($A,$B,$C,$D,$nbre)
{

    for($k=2;$k<=$nbre;$k++)
    {
        $m=$A[$k]/($B[$k-1]);
        $B[$k]=$B[$k]-$m*$C[$k-1];
        $D[$k]=$D[$k]-$m*$D[$k-1];
    }
    $X[$nbre]=$D[$nbre]/$B[$nbre];
    for($k=$nbre-1;$k>=1;$k--)
    {
        $X[$k]=($D[$k]-$C[$k]*$X[$k+1])/$B[$k];
    }

    for($i=1;$i<=$nbre;$i++)
    {
        echo "X".$i."= ".$X[$i]."\n";
    }
}

function DecompositionThomas($matrices,$nbre)
{

    $A[1]=0;
    $C[$nbre]=0;
   for($i=1;$i<=$nbre;$i++)
   {
        $B[$i]=$matrices[$i][$i];
        if($i>1)
        {
            $A[$i]=$matrices[$i][$i-1];
        }

        if($i<$nbre)
        {
            $C[$i]=$matrices[$i][$i+1];
        }
        $D[$i]=$matrices[$i][$nbre+1];
   }

   Thomas($A,$B,$C,$D,$nbre);
}









?>