<?php

function CalculInverse($D,$nbre)
{
    
        for($i=1;$i<=$nbre;$i++)
        {
            $mk=1/ $D[$i][$i];
            $D[$i][$i]=$mk;
        }
   return $D;
}


function inverse($matrices,$nbre)
{
    $I=[];
    $MatricesJoins=[];
    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            if($i==$j)
            {
                $I[$i][$j]=1;
            }else
            {
                $I[$i][$j]=0;
            }
        }
    }
    for($i=1;$i<=$nbre;$i++)
    {
        $k=0;
        for($j=1;$j<=2*$nbre;$j++)
        {
            if($j<=$nbre)
            {
                $MatricesJoins[$i][$j]=$matrices[$i][$j];
            }else
            {
                $k++;
                $MatricesJoins[$i][$j]=$I[$i][$k];
            }
        }
    }
   $gauss=GaussF($MatricesJoins,$nbre);

   if(is_array($gauss))
   {
    
   for($i=1;$i<=$nbre;$i++)
   {
    $pivot=$gauss[$i][$i];
    if($pivot==0)
    {
        return 1;
    }
        for($j=1;$j<=2*$nbre;$j++)
        {
            $gauss[$i][$j]/=$pivot;
        }
   }
   
   for($j=1;$j<=$nbre;$j++)
   {
       for($i=1;$i<=$nbre;$i++)
       {
               if($i!=$j)
               {
                   $c=$gauss[$i][$j]/$gauss[$j][$j];
   
                   for($k=1;$k<=2*$nbre;$k++)
                   {
                    $gauss[$i][$k]-=$c*$gauss[$j][$k];
                   }
                  
               }
       }
   }

   $matricesInverse=[];
   for($i=1;$i<=$nbre;$i++)
   {
    $k=$nbre+1;
        for($j=1;$j<=$nbre;$j++)
        {
            $matricesInverse[$i][$j]=$gauss[$i][$k];
            $k++; 
        }
   }
             return $matricesInverse;
   }else
   {
    return 1;
   }
}



function GaussF($matrices,$nbre)
{   
    for($k=1,$ex=$k+1;$k<=$nbre,$ex<=$nbre;$k++,$ex++)
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
                return 1;
            }
          $mik=($matrices[$i][$k]/$matrices[$k][$k]);
            for($j=$k;$j<=2*$nbre;$j++)
            {
                $matrices[$i][$j]-=($mik*$matrices[$k][$j]);
            }
        }
    }
   return $matrices;
}




?>