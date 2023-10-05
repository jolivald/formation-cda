# Exercice 6.1

Ecrire un algorithme qui déclare et remplisse un tableau de 7 valeurs numériques en les
mettant toutes à zéro.

Réponse:  
```
tableau <- []
Pour i Allant De 0 A 6 Pas 1
Faire
    tableau[i] = 0
FinPour
```

# Exercice 6.2

Ecrire un algorithme qui déclare et remplisse un tableau contenant les six voyelles de
l’alphabet latin.

Réponse:  
```
voyelles <- ["a", "e", "i", "o", "u", "y"]
```

# Exercice 6.3

Ecrire un algorithme qui déclare un tableau de 9 notes, dont on fait ensuite saisir les
valeurs par l’utilisateur.

Réponse:  
```
tableau <- []
Pour i Allant De 0 A 8 Pas 1
Faire
    tableau[i] <- Lire
FinPour

```


# Exercice 6.4

Que produit l’algorithme suivant ?
```
Tableau Nb[5] en Entier
Variable i en Entier
Début
Pour i ← 0 à 5
Nb[i] ← i * i
i suivant
Pour i ← 0 à 5
Ecrire Nb[i]
i suivant
Fin
```
Peut-on simplifier cet algorithme avec le même résultat ?

Réponse:  
Cet algorithme affiche la liste de nombre de 0 à 5 au carré.  
Simplification possible: il n'est pas nécessaire de faire deux boucles.  

```
tableau <- []
Pour i Allant de 0 A 5 Pas 1
Faire
    tableau[i] = i * i
    Ecrire tableau[i]
FinPour
```


# Exercice 6.5

Que produit l’algorithme suivant ?
```
Tableau N[6] en Entier
Variables i, k en Entier
Début
N[0] ← 1
Pour k ← 1 à 6
N[k] ← N[k-1] + 2
k Suivant
Pour i ← 0 à 6
 Ecrire N[i]
i suivant
Fin
```
Peut-on simplifier cet algorithme avec le même résultat ?

Réponse:  
Cet algorithme affiche les nombres impaires de 1 à 13.  
Simplification possible: il n'est pas nécessaire de faire deux boucles.  

```
tableau <- [1]
Ecrire tableau[0]
Pour i Allant De 1 A 6
Faire
    tableau[1] <- tableau[i-1] + 2
    Ecrire tableau[i]
FinPour
```


# Exercice 6.6

Que produit l’algorithme suivant ?

```
Tableau Suite[7] en Entier
Variable i en Entier
Début
Suite[0] ← 1
Suite[1] ← 1
Pour i ← 2 à 7
Suite[i] ← Suite[i-1] + Suite[i-2]
i suivant
Pour i ← 0 à 7
Ecrire Suite[i]
i suivant
Fin
```

Réponse:  
Cet algorithme produit les huit premiers éléments de la suite de fibonacci.  


# Exercice 6.7

Ecrivez la fin de l’algorithme 6.3 afin que le calcul de la moyenne des notes soit effectué
et affiché à l’écran.


Réponse:  
```
notes <- []
somme <- 0
Pour i Allant De 0 A 8 Pas 1
Faire
    notes[i] <- Lire
    somme    <- somme + notes[i]
FinPour
Ecrire "la moyenne est: " + somme / 9

```


# Exercice 6.8

Ecrivez un algorithme permettant à l’utilisateur de saisir un nombre quelconque de
valeurs, qui devront être stockées dans un tableau. L’utilisateur doit donc commencer par
entrer le nombre de valeurs qu’il compte saisir. Il effectuera ensuite cette saisie. Enfin, une
fois la saisie terminée, le programme affichera le nombre de valeurs négatives et le nombre
de valeurs positives.

Réponse:  
```
nombre    <- Lire
valeurs   <- []
negatives <- 0
positives <- 0
Pour i allant de 0 A nombre - 1 Pas 1
Faire
    valeurs[i] <- Lire
    Si valeurs[i] < 0 Alors
        negatives <- negatives + 1
    Sinon
        positives <- positives + 1
    FinSi
FinPour
Ecrire "valeurs positives: " + positives + ", valeurs négatives: " + negatives
```

# Exercice 6.9

Ecrivez un algorithme calculant la somme des valeurs d’un tableau (on suppose que le
tableau a été préalablement saisi).

Réponse:  
```
tableau <- [/* préalablement rempli */]
somme   <- 0
Pour i Allant de 0 A Longueur(tableau) Pas 1
Faire
    somme <- somme + tableau[i]
FinPour
```


# Exercice 6.10
Ecrivez un algorithme constituant un tableau, à partir de deux tableaux de même
longueur préalablement saisis. Le nouveau tableau sera la somme des éléments des deux
tableaux de départ.
Tableau 1 :  
4 8 7 9 1 5 4 6  
Tableau 2 :  
7 6 5 2 1 3 7 4  
Tableau à constituer :  
11 14 12 11 2 8 11 10

Réponse:  
```
tableau1 <- [4, 8, 7, 9, 1, 5, 4, 6]
tableau2 <- [7, 6, 5, 2, 1, 3, 7, 4]
tableau3 <- []
Pour i Allant de 0 A Longueur(tableau1) Pas 1
Faire
    tableau3[i] <- tableau[i] + tableau2[i]
FinPour
```


# Exercice 6.11

Toujours à partir de deux tableaux précédemment saisis, écrivez un algorithme qui
calcule le schtroumpf des deux tableaux. Pour calculer le schtroumpf, il faut multiplier
chaque élément du tableau 1 par chaque élément du tableau 2, et additionner le tout. Par
exemple si l'on a :
Tableau 1 :  
4 8 7 12  
Tableau 2 :  
3 6  
Le Schtroumpf sera :
3 * 4 + 3 * 8 + 3 * 7 + 3 * 12 + 6 * 4 + 6 * 8 + 6 * 7 + 6 * 12 = 279

Réponse:  
```
tableau1       <- [4, 8, 7, 9, 1, 5, 4, 6]
tableau2       <- [7, 6, 5, 2, 1, 3, 7, 4]
multiplicateur <- 0
schtroumpf     <- 0
Pour i Allant de 0 A Longueur(tableau1) Pas 1
Faire
    multiplicateur <- tableau1[i]
    Pour j Allant de 0 A Longueur(tableau2) Pas 1
    Faire
        schtroumpf <- schtroumpf + (multiplicateur * tableau2[j])
    FinPour
FinPour
```


# Exercice 6.12

Ecrivez un algorithme qui permette la saisie d’un nombre quelconque de valeurs, sur le
principe de l’ex 6.8. Toutes les valeurs doivent être ensuite augmentées de 1, et le nouveau
tableau sera affiché à l’écran.

Réponse:  
```
nombre    <- Lire - 1
valeurs   <- []
Pour i allant de 0 A nombre Pas 1
Faire
    valeurs[i] <- Lire
FinPour
Pour i Allant de 0 A nombre Pas 1
Faire
    valeurs[i] <- valeurs[i] + 1
    Ecrire valeurs[i]
FinPour
```


# Exercice 6.13

Ecrivez un algorithme permettant, toujours sur le même principe, à l’utilisateur de
saisir un nombre déterminé de valeurs. Le programme, une fois la saisie terminée, renvoie
la plus grande valeur en précisant quelle position elle occupe dans le tableau. On prendra
soin d’effectuer la saisie dans un premier temps, et la recherche de la plus grande valeur du
tableau dans un second temps.

Réponse:  
```
nombre    <- Lire - 1
valeurs   <- []
actuel    <- 0
valeurMax <- 0
indexMax  <- 0
Pour i allant de 0 A nombre Pas 1
Faire
    valeurs[i] <- Lire
FinPour
Pour i Allant de 0 A nombre Pas 1
Faire
    actuel <- valeurs[i]
    Si actuel > valeurMax Alors
        valeurMax <- actuel
        indexMax  <- i
    FinSi
FinPour
Ecrire "la plus grande valeur est: " + valeurMax + " à l'index: " + indexMax
```


# Exercice 6.14

Toujours et encore sur le même principe, écrivez un algorithme permettant, à
l’utilisateur de saisir les notes d'une classe. Le programme, une fois la saisie terminée,
renvoie le nombre de ces notes supérieures à la moyenne de la classe

Réponse:  
```
nombre      <- Lire - 1
valeurs     <- []
actuel      <- 0
somme       <- 0
moyenne     <- 0
supérieures <- 0
Pour i allant de 0 A nombre Pas 1
Faire
    valeurs[i] <- Lire
    somme      <- somme + valeurs[i]
FinPour
moyenne <- somme / (nombre+1)
Pour i allant de 0 A nombre Pas 1
Faire
    Si valeurs[i] > moyenne Alors
        supérieures <- supérieures + 1
    FinSi
FinPour
Ecrire "il y a " + supérieures + " notes supérieures à la moyenne"
```
