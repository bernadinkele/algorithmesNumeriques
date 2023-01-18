<?

/*function AfficherSurplus($matrices,$nbre)
{
    for($i=1;$i<=$nbre;$i++)
    {
        
        echo "|";
        for($j=1;$j<=2*$nbre+1;$j++)
        {
            if($j==2*$nbre+1)
            {
                echo $matrices[$i][$j]."\t\t|";
            }else
            {
                echo $matrices[$i][$j]."\t\t";
            }
        
        }
       if($i!=$nbre)
       {
        echo "\n";
       }
    }
    echo "\n\n\n\n";
}*/
/**
 * Affiche une matrice sans la matrice augmenter
 *
 * @param [type] $matrices
 * @param [type] $nbre
 * @return void
 */
function Afficher($matrices,$nbre)
{
    for($i=1;$i<=$nbre;$i++)
    {
        
        echo "|";
        for($j=1;$j<=$nbre;$j++)
        {
            if($j==$nbre)
            {
                echo $matrices[$i][$j]."\t\t|";
            }else
            {
                echo $matrices[$i][$j]."\t\t";
            }
        
        }
       if($i!=$nbre)
       {
        echo "\n";
       }
    }
}

/**
 * fonction permettant d'afficher une matrice A augmentée
 *
 * @param [type] $matrices
 * @param [type] $nbre
 * @return void
 */
function AfficherComplet($matrices,$nbre)
{
    echo "\n\n";
    for($i=1;$i<=$nbre;$i++)
    {
        
        echo "|";
        for($j=1;$j<=$nbre+1;$j++)
        {
            if($j==$nbre+1)
            {
                //if()
                echo "|X".$i."\t|=".$matrices[$i][$j];
            }else
            {
                echo $matrices[$i][$j]."\t";
            }
        
        }
       if($i!=$nbre)
       {
        echo "\n";
       }
    }
     echo "\n\n";
}


function AfficherDecomposition($matrices,$L,$U,$nbre)
{
    echo "\n\nLa Matrice A éte decomposer en Matrices L et U\n\n";
    echo "\nMatrice A=\n";
     Afficher($matrices,$nbre);
     echo "\nMatrice L=\n";
     Afficher($L,$nbre);
     echo "\nMatrice U=\n";
     Afficher($U,$nbre);
}


?>