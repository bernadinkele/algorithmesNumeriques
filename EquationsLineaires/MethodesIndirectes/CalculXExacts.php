<?php
require_once "Resolution.php";
require_once "Inversion.php";
function X_Exacts($matrices,$nbre)
{

    $matricesInverse=inverse($matrices,$nbre);
    if(is_array($matricesInverse))
    {
        $X=[];
        for($i=1;$i<=$nbre;$i++)
       {
           $X[$i]=$matrices[$i][$nbre+1];
       }
      
       $ResultatsExacts=Resolution($matricesInverse,$X,$nbre);
       
       return $ResultatsExacts;

    }else
    {
        return 1;
    }
  
}



?>