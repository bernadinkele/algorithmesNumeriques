<?php
require_once "Controle.php";
require_once "Afficher.php";
require_once "MethodesDirectes/Gauss.php";
require_once "MethodesIndirectes/CalculXExacts.php";
require_once "MethodesIndirectes/GaussSiedel.php";
require_once "MethodesIndirectes/Jacobi.php";
require_once "MethodesDirectes/Cholesky.php";
require_once "MethodesDirectes/Crout.php";
require_once "MethodesDirectes/Doolite.php";
require_once "MethodesDirectes/GaussJordan.php";
require_once "MethodesDirectes/GausJordanFlottante.php";
require_once "MethodesDirectes/MethodeThomas.php";

do
{


    echo "\n\nPROGRAMME DE RESOLUTION DES EQUATIONS AX=B";
    echo "\n\n--------------------------------------------------------------------------\n\n";
    echo "Vuillez entrer le nombre N de lignes de la matrice\n\n";

do
{
    $nbre=ControleSaisi("Entrer le nombre de colone et de ligne N:\n");
    if($nbre<=1)
    {
        echo "\nN ne doit pas etre inferieur a 1\n";
    }
}while($nbre<=1);
$matrices=[];
$X0=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
$erreur=0.00000001;
$f=4;
for($i=1;$i<=$nbre;$i++)
{
    for($j=1;$j<=$nbre+1;$j++)
    {
        if($j==$nbre+1)
        {
            $matrices[$i][$j]=ControleSaisi("Entrer l'element ".$i." de la matrice augmenter : ");
        }else
        {
            $matrices[$i][$j]=ControleSaisi("Entrer l'element ".$j." de la ligne ".$i." : ");
        }
       
    }
}


echo "La matrice entré A sous forme de AX=B\n";
echo "-----------------------------------------------------------------------------------\n\n";
AfficherComplet($matrices,$nbre);
echo "\n\nRESOLUTION DE L'EQUATION PAR LES DIFFERENTES METHODES\n\n";
echo "I-LES METHODES DIRECTES\n\n";
echo "\n\n1-Methode d'elimination de Gauss\n\n";
MethodeGauss($matrices,$nbre);
echo "-----------------------------------------------------------------------------------\n\n";
echo "\n\n2-Methode de GaussJordan\n\n";
GaussJordan($matrices,$nbre);
echo "-----------------------------------------------------------------------------------\n\n";
echo "\n\n3-Decomposition LU\n\n";
echo "\n\n\ta-Methode de Cholesky\n\n";
Cholesky($matrices,$nbre);
echo "-----------------------------------------------------------------------------------\n\n";
echo "\n\n\tb-Methode de Crout\n\n";
Crout($matrices,$nbre);
echo "-----------------------------------------------------------------------------------\n\n";
echo "\n\n\tc-Methode de Doolite\n\n";
MethodeDoolite($matrices,$nbre);
echo "-----------------------------------------------------------------------------------\n\n";
echo "\n\n\t4-Methode Thomas\n\n";
if(MatriceTridiagonale($matrices,$nbre)==true)
{
    DecompositionThomas($matrices,$nbre);
}else
{
    echo "\nLa matrice n'est pas tridiagonale donc la methode de Thomas ne peut pas resoudre cette equation\n\n";
}

echo "\n\n-----------------------------------------------------------------------------------\n\n";
echo "I-LES METHODES INDIRECTES\n\n";
echo "\n\nResultats Exacts\n\n";
$Indirects=X_Exacts($matrices,$nbre);

if(is_array($Indirects))
{
    foreach($Indirects as $index=>$x)
    {
        echo "\nX".$index."=".$x;
    }
    echo "\n1-Methode deGaussSiedel\n\n";
    $results=GaussSiedel($matrices,$nbre,$erreur,$X0);
    if(is_array($results))
    {
        foreach($results as $index=>$x)
        {
           if($index>=1 && $index<=$nbre)
           {
            echo "X".$index."=".$x."\n";
           }
        }
    }else
    {
        echo "\n\nImposssible , la matrice n'est pas dominante donc ne peut pas converger\n";
    }
    echo "-----------------------------------------------------------------------------------\n\n";
    echo "\n2-Methode de Jacobi\n\n";
    $results=Jacobi($matrices,$nbre,$erreur,$X0);
    if(is_array($results))
    {
        foreach($results as $index=>$x)
        {
           if($index>=1 && $index<=$nbre)
           {
            echo "X".$index."=".$x."\n";
           }
        }
    }else
    {
        echo "\n\nImposssible , la matrice n'est pas dominante donc ne peut pas converger\n";
    }

}else
{
    echo "la matrice n'est pas invisible"; 
}




    $reponse=readline("\nVoulez vous Recommencer?:");
}while($reponse=="O" || $reponse=="o");
?>