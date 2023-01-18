<?php
require_once "Afficher.php";
require_once "Inversion.php";
require_once "DifferentsOperations.php";
require_once "Resolution.php";
require_once "CalculXExacts.php";
require_once "Controle.php";
function Jacobi($matrices,$nbre,$erreur,$X0)
{
   $X=X_Exacts($matrices,$nbre);
   $matrices=Permutation($matrices,$nbre);
  if(ControleDominante($matrices,$nbre)==$nbre)
  {
    $D=InitialisationD($matrices,$nbre);
    $E=InitialisationE($matrices,$nbre);
    $F=InitialisationF($matrices,$nbre);
    $EplusF=calculSomme($F,$E,$nbre);
    $I=CalculInverse($D,$nbre);
    $K=Resolution($EplusF,$X0,$nbre);
    $add=Addition($K,$matrices,$nbre);
    $Xi=MethodeJacobi($I,$add,$nbre,$erreur);
     $error=10;
     $K=1;
     while($error>$erreur)
     {
         $K=Resolution($EplusF,$Xi,$nbre);
         $add=Addition($K,$matrices,$nbre);
         $X_iplus=MethodeJacobi($I,$add,$nbre,$erreur);
         $Xi=$X_iplus;
         $error=CalculErreurMax($X,$Xi,$nbre);
         $K=CalculErreurMin($X,$Xi,$nbre);
         if($K==0)
         {
             return $Xi;
         }
     }
          return $Xi;
  }else
  {
    return 0;
  }

}







function MethodeJacobi($I,$add,$nbre,$erreur)
{ 
   $results=Resolution($I,$add,$nbre);
    $Xi=Troncature($results,$nbre,$erreur);
    return $Xi;
}




function Addition($A,$B,$nbre)
{
    $add=[];
    for($i=1;$i<=$nbre;$i++)
    {
        $add[$i]=$A[$i]+$B[$i][$nbre+1];
    }
    return $add;
}

/**
 * Fonction d'initilisation de la matrice F
 *
 * @param [type] $matrices
 * @param [type] $nbre
 * @return void
 */
function InitialisationF($matrices,$nbre)
{
    $F=[];
    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            if($i<$j)
            {
                $F[$i][$j]=-$matrices[$i][$j];
            }else
            {
                $F[$i][$j]=0;
            }
        }
    }
    return $F;
}
/**
 * Initialisation de la matrice E
 *
 * @param [type] $matrices
 * @param [type] $nbre
 * @return void
 */
function InitialisationE($matrices,$nbre)
{
    $E=[];
    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            if($i>$j)
            {
                $E[$i][$j]=-$matrices[$i][$j];
            }else
            {
                $E[$i][$j]=0;
            }
        }
    }
    return $E;
}

?>


