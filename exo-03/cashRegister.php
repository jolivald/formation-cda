<?php

// état initial du fond de caisse (en centimes) billet de 500: 50000 centimes
$cashFund = [
  50000 =>  1, // 20/50000 = 0.00002 - 
  20000 =>  1, // 20/20000 = 0.00005 - 
  10000 =>  0, // 20/10000 = 0.0001  - 
  5000  =>  2, // 20/5000  = 0.0002  - 
  2000  =>  3, // 20/2000  = 0.0005  - 
  1000  =>  1, // 20/1000  = 0.001   - 
  500   => 10, // 20/500   = 0.002   - 
  200   => 20, // 20/200   = 0.005   - 
  100   =>  4, // 20/100   = 0.01    - 
  50    =>  2, // 20/50    = 0.02    - 
  20    => 20, // 20/20    = 0.05    - 
  10    => 15, // 20/10    = 0.1     - 
  5     => 23, // 20/5     = 2     -            
  2     => 14, // 20/2     = 5     - min 5      -r50
  1     => 30  // 20/1     = 10       - min 10  -r50
];

$changeLimits = [
  50000 =>  1, // 500
  20000 =>  1, // 200
  10000 =>  2, // 200
  5000  =>  2, // 100
  2000  =>  4, // 80
  1000  =>  4, // 40
  500   => 10, // 50
  200   => 15, // 30
  100   => 20, // 20
  50    => 20, // 10
  20    => 25, // 5
  10    => 30, // 3
  5     => 30, // 1.5
  2     => 30, // 0.6
  1     => 30  // 0.3
];

// fonctionnement de la caisse enregistreuse
function cashRegister(int $totalAmount, array $moneyGiven): array
{
  global $cashFund;

  // calcul du total payé par le client
  $moneyAmount = 0;
  foreach ($moneyGiven as $figure => $amount) {
    $moneyAmount += $figure * $amount;
  }
  // erreur si le total payé est inférieur au montant dû
  if ($moneyAmount < $totalAmount) {
    throw new \Exception("Le client n'a pas donné suffisamment d'argent pour couvrir le paiement.");
  }

  // calcul de la monnaie à rendre au client
  $totalReturned = $moneyAmount - $totalAmount;
  $moneyReturned = [];

  // ajoute l'argent donné par le client au fond de caisse
  foreach ($moneyGiven as $figure => $amount) {
    $cashFund[$figure] += $amount;
  }

  // parcours le fond de caisse pour définir comment rendre la monnaie
  foreach ($cashFund as $figure => $amount) {
    // la figure est disponible et inférieure au montant dû
    if ($amount > 0 && $figure <= $totalReturned) {
      // combien de multiples possible dans la monnaie à rendre?
      $figureCount = floor($totalReturned / $figure);
      if ($figureCount > $amount) {
        $figureCount = $amount;
      }
      if ($figureCount > 0) {
        $moneyReturned[strval($figure)] = $figureCount;
        $totalReturned                 -= $figureCount * $figure;
      }
    }
  }
  // invoque la routine utilisant le monnayeur
  //computeChange();

  // liste des figures avec leurs montants respectifs pour le rendu de la monnaie
  return $moneyReturned;
};

/*
  1. trier le tiroir caisse par nombre de figures ($amount)
  2. définir le nombre optimal dans le tiroir caisse
Valeur pièce…….. Valeur rouleau…… Nombre de pièces
0.01...……………………. 0.50...………………….. 50
0.02...……………………. 1.00...………………….. 50
0.05...……………………. 2.50...………………….. 50
0.10...……………………. 4.00...………………….. 40
0.20...……………………..8.00...…...…...… 40
0.50...……………………..20.00...…………………. 40
1.00...……………………..25.00...…………………. 25
2.00...……………………..50.00...…………………. 25 

définir la priorité d'échange en fonction des limites du monnayeur ?
*/
function computeChange()
{
  global $cashFund;
  // récupère les liste de figures et nombres disponibles dans le fond de caisse
  $figures = array_keys($cashFund);
  $amounts = array_values($cashFund);
  // tri à bulles en fonction du nombre de figures disponibles
  for ($i = 0; $i < count($amounts) - 1; $i++) {
    for ($j = 0; $j < $i - 1; $j++) {
      if ($amounts[$j + 1] < $amounts[$j]) {
        [$amounts[$j + 1], $amounts[$j]] = [$amounts[$j], $amounts[$j + 1]];
        [$figures[$j + 1], $figures[$j]] = [$figures[$j], $figures[$j + 1]];
      }
    }
  }
  $sortedCashFund = array_combine($figures, $amounts);
  return $sortedCashFund;
};

// fonctionnement du monnayeur
function changeMachine(array $moneyToChange, array $preferedFigures): array
{
  global $cashFund;

  $moneyReturned = [];
  return $moneyReturned;
};

// tri à bulles
function bubbleSort($list)
{
  for ($i = 0; $i < count($list) - 1; $i++) {
    for ($j = 0; $j < $i - 1; $j++) {
      if ($list[$j + 1] > $list[$j]) {
        [$list[$j + 1], $list[$j]] = [$list[$j], $list[$j + 1]];
      }
    }
  }
}

// ---8<---

// à payer: 103€32 et payé: 150€
$result = cashRegister(10332, [
  10000 => 1,
  5000 => 1
]);


$temp = computeChange();

echo "ok";
