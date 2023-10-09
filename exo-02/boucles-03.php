<?php

/*
Exercice 3
1. Ecrire un script qui affiche la table de multiplication totale de {1,...,12} par
{1,...,12}, le résultat doit être le suivant : (voir le pdf du cours)
*/

define("MAX_CELL_LENGTH", 3);

for ($i=0; $i<13; $i++){
    $line = "";
    for ($j=0; $j<13; $j++){
        if ($i === 0 && $j === 0){
            $line .= " " . str_repeat(" ", MAX_CELL_LENGTH);
        } else {
            $line .= " " . sprintf("%" . MAX_CELL_LENGTH . "d", $i * $j);
        }
    }
    echo $line . "\n";
}
