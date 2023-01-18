<?php
require_once "Afficher.php";
function GaussJordanF($matrices, $nbre,$f)
{
    for($k = 1; $k <= $nbre; $k++){
        $pivot = $matrices[$k][$k];
        $ligne_pivot = $k;
        /**
         * 
         */
        for($i = $k; $i <= $nbre; $i++)
        {
            if(abs($pivot) < abs($matrices[$i][$k]))
            {
                $pivot = $matrices[$i][$k];
                $ligne_pivot = $i;
            } 
        }
        /**
         * 
         */
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
            /**
             * 
             */
            for($i = 1; $i <= $nbre; $i++)
            {
                $pivot_second = flotante($matrices[$i][$k],$f);
                for($j = $k; $j <= $nbre+1; $j++)
                {
                    if($i != $k)
                    {
                        $matrices[$i][$j] = flotante($matrices[$i][$j],$f) - flotante($matrices[$k][$j],$f)*$pivot_second;
                    }
                    
                }
            }
        }else{
            break;
        }  
    }

    AfficherComplet($matrices, $nbre);
    for($i=1;$i<=$nbre;$i++)
    {
        echo "\nX".$i." =".$matrices[$i][$nbre+1];
    }
}
function flotante($nbre,$f)
{
    $m=pow(10,$f);
    $nbre=(int)($nbre*$m)/$m;
    return $nbre;
}
?>