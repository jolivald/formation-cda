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

// calcul le total d'une liste de figures => compte
function getTotalCash (array $figuresCount): int
{
  $moneyAmount = 0;
  foreach ($figuresCount as $figure => $amount) {
    $moneyAmount += $figure * $amount;
  }
  return $moneyAmount;
}

function giveBackChange (array $cashAvailable, int $totalAmount): array
{
  $cashBack = [];
  // parcours le fond de caisse pour définir comment rendre la monnaie
  foreach ($cashAvailable as $figure => $amount) {
    // la figure est disponible et inférieure au montant dû
    if ($amount > 0 && $figure <= $totalAmount) {
      // combien de multiples possible dans la monnaie à rendre?
      // $figureCount = floor($totalReturned / $figure);
      $figureCount = intdiv($totalAmount, $figure);
      if ($figureCount > $amount) {
        $figureCount = $amount;
      }
      if ($figureCount > 0) {
        $cashBack[strval($figure)] = $figureCount;
        $totalAmount              -= $figureCount * $figure;
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
  foreach($cashReturned as $figure => $value) {
    $cashFund[$figure] -= $value;
  }

  // invoque la routine utilisant le monnayeur
  //computeChange();

  // liste des figures avec leurs montants respectifs pour le rendu de la monnaie
  return $cashReturned;
};

// définit les priorités d'échanges avec le monnayeur
function prepareChange()
{
  global $cashFund;
  global $changeLimits;
  // calcul des différences entre limites monnayeur et fond de caisse pondérées par la valeur des figures
  $diffLimits = [];
  foreach ($changeLimits as $figure => $limit) {
    $diffLimits[$figure] = ($limit - $cashFund[$figure]) * $figure;
  }
  // tri les différences en respectant les associations clé => valeur
  uasort($diffLimits, function ($a, $b){ return $a < $b; });

  // il y a 15 figures en tout

  // prends les 5 premières comme requête monnayeur
  $neededFigures = array_slice($diffLimits, 0, 5, true);
  foreach ($neededFigures as $figure => &$value) {
    $value = true;
  }
  // prends les 5 dernières pour envoyer au monnayeur
  $sendedFigures = array_slice($diffLimits, 10, 15, true);
  foreach ($sendedFigures as $fogure => &$value) {
    $value = intdiv($value,  2);
    if ($value == 0){ $value++; }
  }

  return [
    "cash"    => $sendedFigures,
    "request" => $neededFigures
  ];
};

// fonctionnement du monnayeur
function changeMachine(array $moneyToChange, array $preferedFigures): array
{
  global $changeLimits;

  // crée une copy locale des limites du monnayeur
  $limits = array_slice($changeLimits, 0);

  // calcule le montant total passé pour faire de la monnaie
  $moneyAmount = getTotalCash($moneyToChange);

  while ($moneyAmount > 0) {
    // boucle sur les figures demandés
    foreach ($preferedFigures as $figure => $value) {

    }
  }

  // impossible de rendre l'ensemble de la monnaie avec les figures demandées uniquement
  if ($moneyAmount > 0) {

  }

  $moneyReturned = [];
  return $moneyReturned;
};

// ---8<---

// à payer: 103€32 et payé: 150€
$cashReturned = cashRegister(10332, [
  10000 => 1,
  5000 => 1
]);


$tempTest = prepareChange();

echo "eof";
