<?php

function ControleSaisi(String $phrase)
{
    do
    {
        $nbre=readline($phrase);
        if($nbre==" "|| !is_numeric($nbre))
        {
            echo "\nVotre saisie n'est pas compatible:\n";
        }
    }while($nbre==" "|| !is_numeric($nbre));
    return $nbre;
}

?>