<?php
require_once "Localisation.php";
require_once "Dichotomie.php";
require_once "Substitution.php";
require_once "Newton.php";
require_once "Corde.php";
echo "Bienvenu dans le programme de resolution des equations de la forme f(x)=0 dans une intervalle [a,b]\n";
echo "---------------------------------------------------------------------------------------\n\n";
do
{
    do
    {
        do
        {
            $inferior=readline("Vueillez entrer la borne inferieure:  ");
        }while($inferior==" " || !is_numeric($inferior));
        do
        {
            $superior=readline("Vueillez entrer la borne superieure:   ");
        }while($superior==" " || !is_numeric($superior));

        if($inferior>$superior)
        {
            echo "\nla borne inferieur ne peut pas etre superieur a la borne inferieur\n";
        }
        if($inferior==$superior)
        {
            echo "\nla borne inferieur ne peut pas etre egale a la borne inferieur\n";
        }
    }while($inferior>=$superior);

    do
    {
        $erreur=readline("Vueillez entrer la precision k(compris entre 0 et 0.1) ");
        if($erreur==" " || !is_numeric($erreur) || $erreur>0.1 || $erreur<0)
        {
            echo "\n\nAttention!!!\n";
        }
    }while($erreur==" " || !is_numeric($erreur) || $erreur>0.1 || $erreur<0);

    $intervalles=Localisation($inferior,$superior);
    $pas=$intervalles[0];
    $resulatsD=[];
    $resulatsS=[];
    $resulatsN=[];
    $resulatsC=[];
    if(count($intervalles[1])==0)
    {
        echo "\nPas de solution\n";
    }else
    {
        echo "\n\n-Methode de Dichotomie\n\n";
        echo "----------------------------------------------------------------\n\n\n\n";
        foreach($intervalles[1] as $k)
        {
          $resulatsD[]=Dichotomie($k-$pas,$k,$erreur);
        }
        foreach($resulatsD as $x)
        {
            echo $x;
        }


        echo "\n\n-Methode de Substitution\n\n";
        echo "----------------------------------------------------------------\n\n\n";
        foreach($intervalles[1] as $k)
        {
          $X0=(2*$k-$pas)/2;
          $resulatsS[]=Substitution($X0,$erreur);
        }
        foreach($resulatsS as $x)
        {
            echo $x;
        }
        echo "\n\n-Methode de Newton\n\n";
        echo "----------------------------------------------------------------\n\n\n\n";
        foreach($intervalles[1] as $k)
        {
          $X0=(2*$k-$pas)/2;
          $resulatsN[]=Newton($X0,$erreur);
        }
        foreach($resulatsN as $x)
        {
            echo $x;
        }
        echo "\n\n-Methode de Corde\n\n";
        echo "----------------------------------------------------------------\n\n\n\n";
        foreach($intervalles[1] as $k)
        {
          $X0=(2*$k-$pas)/2;
          $resulatsC[]=Corde($k-$pas,$k,$erreur);
        }
        foreach($resulatsC as $x)
        {
            echo $x;
        }
    }

    $reponse=readline("\nVoulez vous recommencez?(O/N) : ");
}while($reponse=='O' || $reponse=='o');


?>