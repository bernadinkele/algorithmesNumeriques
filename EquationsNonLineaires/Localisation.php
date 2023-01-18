<?php
require_once "Function.php";

function Localisation($inferior,$superior)
{
    $intervalles=[];
    $amplitude=0.1;
    $superior+=$amplitude;
    $pas=$inferior+$amplitude;
    while($pas<=$superior)
    {
       if(fonction($pas)*fonction($inferior)<=0)
       {
        $intervalles[]=$pas;
       }
       $inferior=$pas;
       $pas+=$amplitude;
    }
  $results=[];
  $results[]=$amplitude;
  $results[]=$intervalles;
   return  $results;
    
}

?>

