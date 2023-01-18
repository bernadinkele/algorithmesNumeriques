<?php
require_once "Afficher.php";
require_once "Inversion.php";
require_once "DifferentsOperations.php";
require_once "Resolution.php";
require_once "CalculXExacts.php";
require_once "Controle.php";
function GaussSiedel($matrices,$nbre,$erreur,$X0)
{
    $X=X_Exacts($matrices,$nbre);
    $matrices=Permutation($matrices,$nbre);
    if(ControleDominante($matrices,$nbre)==$nbre)
    {
            $L=InitialisationL($matrices,$nbre);
        $D=InitialisationD($matrices,$nbre);
        $U=InitialisationU($matrices,$nbre);
        $LD=calculSomme($L,$D,$nbre);
        $I=inverse( $LD,$nbre);
        $M=Resolution($U,$X0,$nbre);
        $Sous=Soubstration($matrices, $M,$nbre);
        $Xi=MethodeGaussSiel($I,$Sous,$nbre,$erreur);
        $error=10;
        $K=1;
        while($error>$erreur)
        {
            $M=Resolution($U,$Xi,$nbre);
            $Sous=Soubstration($matrices, $M,$nbre);
            $X_iplus=MethodeGaussSiel($I,$Sous,$nbre,$erreur);
            $Xi= $X_iplus;
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

function MethodeGaussSiel($I,$add,$nbre,$erreur)
{ 
   $results=Resolution($I,$add,$nbre);
    $Xi=Troncature($results,$nbre,$erreur);
    return $Xi;
}


function Soubstration($B,$A,$nbre)
{
 
    $Sous=[];
    for($i=1;$i<=$nbre;$i++)
    {
        $Sous[$i]=$B[$i][$nbre+1]-$A[$i];
    }
    return $Sous;
}



function InitialisationU($matrices,$nbre)
{
    $F=[];
    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            if($i<$j)
            {
                $F[$i][$j]=$matrices[$i][$j];
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
function InitialisationL($matrices,$nbre)
{
    $L=[];
    for($i=1;$i<=$nbre;$i++)
    {
        for($j=1;$j<=$nbre;$j++)
        {
            if($i>$j)
            {
                $L[$i][$j]=$matrices[$i][$j];
            }else
            {
                $L[$i][$j]=0;
            }
        }
    }
    return $L;
}

?>