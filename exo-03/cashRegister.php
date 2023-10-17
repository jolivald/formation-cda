<?php

// état initial du fond de caisse (en centimes) billet de 500: 50000 centimes
$cashFund = [
  50000 =>  1,
  20000 =>  1,
  10000 =>  0,
  5000  =>  2,
  2000  =>  3,
  1000  =>  1,
  500   => 10,
  200   => 20,
  100   =>  4,
  50    =>  2,
  20    => 20,
  10    => 15,
  5     => 23,
  2     => 14,
  1     => 30
];

$changeLimits = [
  50000 =>  1,
  20000 =>  1,
  10000 =>  2,
  5000  =>  2,
  2000  =>  4,
  1000  =>  4,
  500   => 10,
  200   => 15,
  100   => 20,
  50    => 20,
  20    => 25,
  10    => 30,
  5     => 30,
  2     => 30,
  1     => 30
];

// tableau contenant toutes les figures avec pour valeur 0
$allFigures = array_fill_keys(array_keys($changeLimits), 0);

// calcul le total d'une liste associative de figures => nombre
function getTotalCash(array $figuresCount): int
{
  $moneyAmount = 0;
  foreach ($figuresCount as $figure => $amount) {
    $moneyAmount += $figure * $amount;
  }
  return $moneyAmount;
}

// fonction de rendu monnaie, privilégie les figures les plus élévées
function giveBackChange(array $cashAvailable, int $totalAmount): array
{
  global $allFigures;

  // copie le tableau contenant toutes les figures avec pour valeur 0
  $cashBack = $allFigures;

  // parcours le fond de caisse pour définir comment rendre la monnaie
  foreach ($cashAvailable as $figure => $amount) {
    // la figure est disponible et inférieure au montant dû
    if ($amount > 0 && $figure <= $totalAmount) {
      // combien de multiples possible dans la monnaie à rendre?
      $figureCount = intdiv($totalAmount, $figure);
      if ($figureCount > $amount) {
        $figureCount = $amount;
      }
      if ($figureCount > 0) {
        $cashBack[$figure] += $figureCount;
        $totalAmount       -= $figureCount * $figure;
      }
    }
  }

  return $cashBack;
}

// fonctionnement de la caisse enregistreuse
function cashRegister(int $totalAmount, array $moneyGiven): array
{
  global $cashFund;

  // calcul du total payé par le client
  $moneyAmount = getTotalCash($moneyGiven);

  // erreur si le total payé est inférieur au montant dû
  if ($moneyAmount < $totalAmount) {
    throw new \Exception("Le client n'a pas donné suffisamment d'argent pour couvrir le paiement.");
  }

  // calcul de la monnaie à rendre au client
  $totalReturned = $moneyAmount - $totalAmount;

  // ajoute l'argent donné par le client au fond de caisse
  foreach ($moneyGiven as $figure => $amount) {
    $cashFund[$figure] += $amount;
  }

  $cashReturned = giveBackChange($cashFund, $totalReturned);

  // retire la monnaie rendue du fond de caisse
  foreach ($cashReturned as $figure => $value) {
    $cashFund[$figure] -= $value;
  }

  changeMachine();

  // liste des figures avec leurs montants respectifs pour le rendu de la monnaie
  return $cashReturned;
};

// fonctionnement du monnayeur
function changeMachine(): array
{
  global $cashFund;
  global $changeLimits;

  // calcul des différences entre limites monnayeur et fond de caisse pondérées par la valeur des figures
  $diffLimits = [];
  foreach ($changeLimits as $figure => $limit) {
    $diffLimits[$figure] = ($limit - $cashFund[$figure]) * $figure;
  }
  // tri les différences en respectant les associations clé => valeur
  uasort($diffLimits, function ($a, $b) {
    return $a < $b;
  });

  // il y a 15 figures en tout

  // prends les 5 premières figures comme requête monnayeur
  $neededFigures = array_slice($diffLimits, 0, 5, true);
  foreach ($neededFigures as $figure => &$value) {
    $value = true;
  }

  // prends les 5 dernières figures pour envoyer au monnayeur
  $sendedLimits  = array_slice($diffLimits, 10, 15, true);
  $sendedFigures = array_fill_keys(array_keys($sendedLimits), 0);

  // prends la moitié disponible dans le tiroir caisse (un au minimum)
  foreach ($sendedFigures as $figure => &$value) {
    $value = intdiv($value,  2);
    if ($value == 0) {
      $value++;
    }
    $cashFund[$figure] -= $value;
  }

  // crée une copy locale des limites du monnayeur
  $limits = $changeLimits;

  // calcule le montant total passé pour faire de la monnaie
  $moneyAmount = getTotalCash($sendedFigures);

  // crée un tableau contenant toutes les figures avec pour valeur 0
  $cashBack = array_fill_keys(array_keys($limits), 0);
  
  // boucle sur les figures demandés
  while ($moneyAmount > 0) {
    foreach ($neededFigures as $figure => $value) {
      // la figure est disponible et inférieure au montant à rendre
      if ($limits[$figure] > 0 && $figure <= $moneyAmount) {
        $cashBack[$figure]++;
        $limits[$figure]--;
        $moneyAmount -= $figure;
      } else {
        break 2;
      }

    }
  }

  // impossible de rendre de la monnaie avec les figures demandées uniquement
  if ($moneyAmount > 0) {
    // récupère le montant restant à donner en fonction des limites monnayeur
    $addToCashBack = giveBackChange($limits, $moneyAmount);
    foreach ($addToCashBack as $figure => $value) {
      $cashBack[$figure] += $value;
    }
  }

  // ajoute la monnaie au tiroir caisse
  foreach ($cashBack as $figure => $value) {
    $cashFund[$figure] += $value;
  }

  return $cashBack;
};

// ---8<--- tests

// à payer: 103€32, payé: 150€, rendu: 46.68
$cashReturned_1 = cashRegister(10332, [
  10000 => 1,
  5000 => 1
]);
$totalReturned_1 = getTotalCash($cashReturned_1) / 100;

// à payer: 77€81, payé: 104€, rendu: 26€19
$cashReturned_2 = cashRegister(7781, [
  5000 => 2,
  200  => 1,
  100  => 2
]);
$totalReturned_2 = getTotalCash($cashReturned_2) / 100;


echo("eof");