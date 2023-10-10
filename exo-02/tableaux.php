<?php

/*
Cet exercice est issu d'un cas réel de développement d'une application de gestion de plannings.

Le tableau $a ci-dessous représente les plannings de groupes de stagiaires.
Le code 19XXX représente le numéro de groupe.
Les positions correspondent aux numéros de semaines dans l'année (peu importe quelle année).
Les valeurs vides ("") en début et fin de tableau indiquent respectivement que la formation n'a pas commencé / est terminée.
Quand une formation a débuté, les cellules vides indiquent des vacances.
*/

$a = array(
  "19001" => array(
    "Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
    "", "", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
    "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"
  ),
  "19002" => array(
    "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
    "Centre", "Centre", "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage",
    "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""
  ),
  "19003" => array(
    "", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre",
    "Centre", "Centre", "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage",
    "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation"
  )
);

/*
Exercice 0
Testez les différents exemples du cours, à l'aide de la fonction var_dump().
=> var_dump($a);

Exercice 1
Quelle semaine a lieu la validation du groupe 19002 ?
*/
$group_1             = $a[19002];
$lastValidationIndex = 0;
foreach ($group_1 as $index => $value){
    if ($value === "Validation"){ $lastValidationIndex = $index; }
}
echo("<p>La validation du groupe 19002 a lieu en semaine: " . $lastValidationIndex . "</p>");

/*
Exercice 2
Trouver la position de la dernière occurrence de Stage pour le groupe 19001
*/

$group_2          = $a[19001];
$lastStageIndex   = 0;
foreach ($group_2 as $index => $value){
  if ($value === "Stage"){ $lastStageIndex = $index; }
}
echo("<p>La dernière occurence de Stage dans le groupe 19001 est à l'index: " . $lastStageIndex . "</p>");