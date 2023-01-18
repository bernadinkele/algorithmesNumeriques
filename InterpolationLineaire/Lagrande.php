<?php

function Lagrande($X,$Y,$nbre)
{
    $PhinNum=[];
    $PhiDeno=[];
    for($i=0;$i<=$nbre;$i++)
    {
        $NumProduit="";
        $DenoProdui=1;
        for($j=0;$j<=$nbre;$j++)
        {
            if($j!=$i)
            {
                if($X[$j]>0)
                {
                    $NumProduit.="(x-".$X[$j].")";
                }elseif($X[$j]<0)
                {
                    $NumProduit.="(x+".-$X[$j].")";
                }elseif($X[$j]==0)
                {
                    $NumProduit.="(x".")";
                }
                
                $DenoProdui*=($X[$i]-$X[$j]);
            }
        }
        //echo "\n".$NumProduit;
        $PhinNum[$i]=$NumProduit;
        $PhiDeno[$i]=$DenoProdui;
    }

    $P_X="";
    for($i=0,$next=0;$i<=$nbre,$next<=$nbre;$i++,$next++)
    {
        
        if($i!=$nbre)
        {
            $P_X.="(".$Y[$i]/$PhiDeno[$i].")".$PhinNum[$i]." + ";
        }else
        {
            $P_X.="(".$Y[$i]/$PhiDeno[$i].")".$PhinNum[$i];
        }
    }
    echo  $P_X;
}








?>