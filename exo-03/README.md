# Caisse enregistreuse et monnayeur

pas d'usage de fonctions de tri php
prendre l'état du fond de caisse en paramètre

monnayeur accepte tableau de booléen pour sélectionner les figures à répartir dans la monnaie
et limite chaque figures à une valeur donnée

en:
cash register  = caisse enregistreuse
change machine = monnayeur
cash fund      = fond de caisse


l'argent du client est a ajouter au fond de caisse!

## Limites du monnayeur :

500: 1
200: 1
100: 2 
50: 2 
20: 4
10: 4
5: 10
2: 15
1: 20
0,50: 20
0,20: 25
0,10: 30
0,05: 30
0,02: 30
0,01: 30


## Etat de base de la caisse enrergistreuse : 

500: 1
200: 1
100: 0 
50: 2 
20: 3
10: 1
5: 10
2: 20
1: 4
0,50: 2
0,20: 20
0,10: 15
0,05: 23
0,02: 14
0,01: 30
