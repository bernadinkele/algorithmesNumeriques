  <?php
require_once "Afficher.php";
require_once "Resolution.php";
require_once "Controle.php";
function MethodeGauss($matrices,$nbre)
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
                echo "la matrice n'est ps inversible , donc la methode gauss ne peut pas resoudre cette equation\n";
                return;
            }
           $mik=($matrices[$i][$k]/$matrices[$k][$k]);
            for($j=$k;$j<=$nbre+1;$j++)
            {
                $matrices[$i][$j]-=($mik*$matrices[$k][$j]);
            }

        }
    }
   AfficherComplet($matrices,$nbre);
   $X=ResolutionTriangulaireInferieur($matrices,$nbre);
   if(is_array($X))
   {
    ResutatInferior($X,$nbre);
   }else
   {
    echo "Impossible de Resoudre avec cette methode\n\n";
   }
}

?>