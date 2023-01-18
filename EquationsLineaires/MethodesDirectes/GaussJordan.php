<?php
require_once "Afficher.php";
function GaussJordan($matrices, $nbre)
{
    for($k = 1; $k <= $nbre; $k++){
        $pivot = $matrices[$k][$k];
        $ligne_pivot = $k;
        for($i = $k; $i <= $nbre; $i++)
        {
            if(abs($pivot) < abs($matrices[$i][$k]))
            {
                $pivot = $matrices[$i][$k];
                $ligne_pivot = $i;
            } 
        }
        if($pivot != 0)
        {
            if($ligne_pivot != $k)
            {
                for($j = 1; $j <= $nbre+1; $j++)
                {
                    $new = $matrices[$k][$j];
                    $matrices[$k][$j] = $matrices[$ligne_pivot][$j];
                    $matrices[$ligne_pivot][$j] = $new;
                }
            }
            $pivot_fixe = $matrices[$k][$k];

            for($j = $k; $j <= $nbre+1; $j++)
            {
                $matrices[$k][$j] = $matrices[$k][$j]/$pivot_fixe; 
            }
            for($i = 1; $i <= $nbre; $i++)
            {
                $pivot_second = $matrices[$i][$k];
                for($j = $k; $j <= $nbre+1; $j++)
                {
                    if($i != $k)
                    {
                        $matrices[$i][$j] = $matrices[$i][$j] - $matrices[$k][$j]*$pivot_second;
                    }
                    
                }
            }
        }else{
           echo "Matrice non inbersible donc la methode de gaussJordan ne peut pas resoudre cette equation\n\n";
           return ;
        }  
    }

    AfficherComplet($matrices, $nbre);
    for($i=1;$i<=$nbre;$i++)
    {
        echo "\nX".$i." =".$matrices[$i][$nbre+1];
    }
}

?>