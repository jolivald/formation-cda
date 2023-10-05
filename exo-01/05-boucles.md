# Exercice 5.1

Ecrire un algorithme qui demande à l’utilisateur un nombre compris entre 1 et 3 jusqu’à
ce que la réponse convienne.

Réponse:  
```
nombre <- 0
TantQue nombre < 1 Ou nombre > 3
Faire
    nombre <- Lire
FinTantQue
```


# Exercice 5.2

Ecrire un algorithme qui demande un nombre compris entre 10 et 20, jusqu’à ce que la
réponse convienne. En cas de réponse supérieure à 20, on fera apparaître un message :
« Plus petit ! », et inversement, « Plus grand ! » si le nombre est inférieur à 10.

Réponse:  
```
nombre <- 0
valide <- faux
TantQue valide == faux
Faire
    nombre <- Lire
    Si nombre > 20 Alors
        Ecrire "Plus petit !"
    SinonSi nombre < 10 Alors
        Ecrire "Plus grand !"
    Sinon
        valide <- vrai
    FinSi
FinTanQue
```


# Exercice 5.3

Ecrire un algorithme qui demande un nombre de départ, et qui ensuite affiche les dix
nombres suivants. Par exemple, si l'utilisateur entre le nombre 17, le programme affichera
les nombres de 18 à 27.

Réponse:
```
nombre <- Lire
début  <- nombre + 1
fin    <- début + 10
Pour i Allant De début A fin Pas 1
Faire
    Ecrire nombre
FinPour
```


# Exercice 5.4

Réécrire l'algorithme précédent, en utilisant cette fois l'instruction Pour
Exercice 5.5
Ecrire un algorithme qui demande un nombre de départ, et qui ensuite écrit la table de
multiplication de ce nombre, présentée comme suit (cas où l'utilisateur entre le nombre 7) :
Table de 7 :
7 x 1 = 7
7 x 2 = 14
7 x 3 = 21
…
7 x 10 = 70

Réponse:
```
Pour i Allant De 1 A 10
Faire
    Ecrire "7 x " + i + " = " + (7 * i)
FinPour
```


# Exercice 5.6

Ecrire un algorithme qui demande un nombre de départ, et qui calcule la somme des
entiers jusqu’à ce nombre. Par exemple, si l’on entre 5, le programme doit calculer :
1 + 2 + 3 + 4 + 5 = 15
NB : on souhaite afficher uniquement le résultat, pas la décomposition du calcul.

Réponse:  
```
nombre <- Lire
somme  <- 0
Pour i Allant De 1 A nombre Pas 1
Faire
    somme <- somme + i
FinPour
Ecrire somme
```


# Exercice 5.7

Ecrire un algorithme qui demande un nombre de départ, et qui calcule sa factorielle.
NB : la factorielle de 8, notée 8 !, vaut
1 x 2 x 3 x 4 x 5 x 6 x 7 x 8

Réponse:  
```
nombre  <- Lire
produit <- 1
Pour i Allant De 1 A nombre Pas 1
Faire
    produit <- produit * i
FinPour
Ecrire produit
```


# Exercice 5.8

Ecrire un algorithme qui demande successivement 20 nombres à l’utilisateur, et qui lui
dise ensuite quel était le plus grand parmi ces 20 nombres :
Entrez le nombre numéro 1 : 12
Entrez le nombre numéro 2 : 14
etc.
Entrez le nombre numéro 20 : 6
Le plus grand de ces nombres est : 14
Modifiez ensuite l’algorithme pour que le programme affiche de surcroît en quelle
position avait été saisie ce nombre :
C’était le nombre numéro 2

Réponse:  
```
nombres   <- []
actuel    <- 0
indexMax  <- 0
// valeurs arbitrairement longue, en réalité il faudrait utiliser quelque chose comme Number.MAX_SAFE_INTEGER en js
valeurMax <- -99999999999999999999999999999999999999999999999999999999999999999999999999999
Pour i Allant De 0 A 19 Pas 1
Faire
    Ecrire "Entrez le nombre numéro " + (i + 1)
    nombres[i] <- Lire
FinPour
Pour i Allant De 0 A 19 Pas 1
Faire
    actuel <- nombres[i]
    Si actuel > valeurMax Alors
        valeurMax <- actual
        indexMax  <- i
    FinSi
FinPour
Ecrire "Le plus grand de ces nombres est : " + valeurMax
Ecrire "C'était le nombre numéro " + indexMax
```


# Exercice 5.9

Réécrire l’algorithme précédent, mais cette fois-ci on ne connaît pas d’avance combien
l’utilisateur souhaite saisir de nombres. La saisie des nombres s’arrête lorsque l’utilisateur
entre un zéro.


Réponse:  
```
nombre    <- -1
nombres   <- []
actuel    <- 0
indexMax  <- 0
// valeurs arbitrairement longue, en réalité il faudrait utiliser quelque chose comme Number.MAX_SAFE_INTEGER en js
valeurMax <- -99999999999999999999999999999999999999999999999999999999999999999999999999999
question  <- vrai
index     <- 0
TantQue question == vrai
Faire
    Ecrire "Entrez le nombre numéro " + (index + 1)
    nombre <- Lire
    Si nombre == 0 Alors
        // l'utilisateur entre 0 donc on sort de la boucle
        question <- faux
    Sinon
        // stocke le nombre utilisateur et incrémente l'index
        nombres[index] <- Lire
        index <- index + 1
    FinSi
FinTanQue
Pour i Allant De 0 A Longueur(nombres) Pas 1
Faire
    actuel <- nombres[i]
    Si actuel > valeurMax Alors
        valeurMax <- actual
        indexMax  <- i + 1
    FinSi
FinPour
Ecrire "Le plus grand de ces nombres est : " + valeurMax
Ecrire "C'était le nombre numéro " + indexMax
```


# Exercice 5.10

Lire la suite des prix (en euros entiers et terminée par zéro) des achats d’un client.
Calculer la somme qu’il doit, lire la somme qu’il paye, et simuler la remise de la monnaie en
affichant les textes "10 Euros", "5 Euros" et "1 Euro" autant de fois qu’il y a de coupures de
chaque sorte à rendre.

Réponse:  
```
question <- vrai
prix     <- 0
total    <- 0
somme    <- 0
rendu    <- 0
TantQue question == vrai
Faire
    Ecrire "Entrez le prix d'un achat"
    prix <- Lire
    Si prix == 0 Alors
        question <- faux
    Sinon
        total <- total + prix
    FinSi
FinTanQue
Ecrire "Entrez la somme payée"
somme <- Lire
rendu <- somme - total
TantQue rendu > 0
Faire
    Si rendu >= 10 Alors
        Ecrire "10 euros"
        rendu <- rendu - 10
    SinonSi rendu >= 5 Alors
        Ecrire "5 euros"
        rendu <- rendu - 5
    Sinon
        Ecrire "1 euro"
        rendu <- rendu - 1
    FinSi
FinTanQue
```

# Exercice 5.11

Écrire un algorithme qui permette de connaître ses chances de gagner au tiercé, quarté,
quinté et autres impôts volontaires.
On demande à l’utilisateur le nombre de chevaux partants, et le nombre de chevaux
joués. Les deux messages affichés devront être :
Dans l’ordre : une chance sur X de gagner
Dans le désordre : une chance sur Y de gagner
X et Y nous sont donnés par la formule suivante, si n est le nombre de chevaux partants
et p le nombre de chevaux joués (on rappelle que le signe ! signifie "factorielle", comme
dans l'exercice 5.7 ci-dessus) :
X = n ! / (n - p) !
Y = n ! / (p ! * (n – p) !)
NB : cet algorithme peut être écrit d’une manière simple, mais relativement peu
performante. Ses performances peuvent être singulièrement augmentées par une petite
astuce. Vous commencerez par écrire la manière la plus simple, puis vous identifierez le
problème, et écrirez une deuxième version permettant de le résoudre.

Réponse:  
```
partants     <- Lire
joués        <- Lire
restants     <- partants - joués
factPartants <- 1
factjoués    <- 1
factRestants <- 1
ordre        <- 0
désordre     <- 0

Pour i Allant De 1 A partants Pas 1
Faire
    factPartants <- factPartants * i
    Si i <= joués Alors
        factJoués <- factJoués * i
    FinSi
    Si i <= restants Alors
        factRestants <- factRestants * i
    FinSi
FinPour
ordre    <- factPartants / factRestants
désordre <- factPartants / (factJoués * factRestants)
Ecrire "Dans l'ordre : une chance sur " + ordre + " de gagner"
Ecrire "Dans le désordre : une chance sur " + désordre + " de gagner"
```
