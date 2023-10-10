<?php

/*
Ecrivez la fonction calculator() traitant les opérations d'addition, de soustraction, de
multiplication et de division.
*/

function calculator($operator, $number_1, $number_2){
  switch($operator){
    case "+":
    case "addition": return $number_1 + $number_2;

    case "-":
    case "soustraction": return $number_1 - $number_2;

    case "*":
    case "multiplication": return $number_1 * $number_2;

    case "/":
    case "division": return $number_1 / $number_2;

    default: throw new \Exception("Opérateur invalide: " . $operator);
  }
}

