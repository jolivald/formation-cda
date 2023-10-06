# Exercice 7.15

Écrire un algo qui retire un espace vide en fin de chaîne de caractère si il y en a un

Réponse:  
```
entrée    <- "lorem ipsum "
taille    <- Longueur(chaine) - 1
sortie    <- ""
caractère <- ""
Pour i Allant De 0 A taile Pas 1
Faire
    caractère <- entrée[i]
    Si i < taille Ou caractère != " " Alors
        sortie <- sortie + entrée[i]
    FinSi
FinPour
```


# Exercice 7.16

Écrire un algo qui retourne l'emplacement d'une lettre dans l'alphabet, lettre fournie par l'utilisateur.

Réponse:  
```
lettre   <- Lire
alphabet <- ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"]
trouvé   <- faux
index    <- 0
TantQue trouvé == faux
Faire
    Si alphabet[index] == lettre Alors
        trouvé <- vrai
    Sinon
        index <- index + 1
    FinSi
FinTantQue
Ecrire "la lettre: " + lettre + " est à l'index: " + (index + 1) + dans l'alphabet"
```


# Exercice 7.17

Écrire un algo qui vérifie l'égalité de deux tableaux fournis en paramètres.

Réponse:  
```
tableau1 <- [/* fourni en paramètres */]
tableau2 <- [/* fourni en paramètres */]
taille   <- Longueur(tableau1)
index    <- 0
comparer <- vrai
Si taille 1 != Longueur(tableau2) Alors
    Ecrire "les deux tableaux sont différents"
Sinon
    TantQue comparer == vrai
    Faire
        Si tableau1[index] != tableau2[index] Alors
            comparer <- faux
        Sinon
            index <- index + 1
        FinSi
    FinTantQue
    Si index == taille - 1 Alors
        Ecrire "les deux tableaux sont différents"
    Sinon
        Ecrire "les deux tableaux sont égaux"
    FinSi
FinSi
```

# Exercice 7.18

Écrire un algorithme de tri à bulle (bubblesort) [article wikipédia](https://fr.wikipedia.org/wiki/Tri_%C3%A0_bulles)

Réponse:  
```
tableau    <- [/* fourni en paramètre */]
temporaire <- 0
Pour i Allant De Longeur(tableau) - 1 A 1 Pas -1
Faire
    Pour j Allant De 0 A i - 1 Pas 1
    Faire
        Si tableau[j+1] < tableau[j+1] Alors
            temporaire   <- tableau[j]
            tableau[j]   <- tableau[j+1]
            tableau[j+1] <- temporaire
        FinSi
    FinPour
FinPour
```

# Exercice 7.19

Écrire un algo de tri par tas (heapsort) [article wikipédia](https://fr.wikipedia.org/wiki/Tri_par_tas)

Réponse:  
```
tableau    <- [/* fourni en paramètre */]
longueur   <- Longueur(tableau) - 1
temporaire <- 0
Fonction tamiser (arbre, noeud, n)
    k <- noeud
    j <- 2 * k
    TantQue j <= n
    Faire
        Si j < n Et arbre[j] < arbre[j+1]
        Alors
            j <- j + 1
        FinSi
        Si arbre[k] < arbre[j]
        Alors
            temporaire <- 2 * k
            k <- j
            j <- temporaire
        Sinon
            j <- n + 1
        FinSi
    FinTantQue
FinFonction

Pour i Allant De longueur / 2 A 0
Faire
    tamiser(tableau, i, longueur)
FinPour
Pour i Allant De longueur A 1
Faire
    temporaire <- tableau[i]
    tableau[i] <- tableau[1]
    tableau[1] <- temporaire
FinPour

```


# Exercice 7.20

Écrire un algo de tri par pivot (quicksort) [article wikipédia](https://fr.wikipedia.org/wiki/Tri_rapide)

Réponse:  
```
tableau    <- [/* fourni en paramètre */]
temporaire <- 0
index      <- 0
pivot      <- 0
Fonction partition (liste, premier, dernier, pivot)
    temporaire     <- liste[dernier]
    liste[dernier] <- liste[pivot]
    liste[pivot]   <- temporaire
    index          <- premier
    Pour i Allant De premier A dernier Pas 1
    Faire
        Si liste[i] <= lister[dernier]
        Alors
            temporaire   <- liste[index]
            liste[index] <- liste[j]
            liste[j]     <- temporaire
            index <- index + 1
        FinSi
    FinPour
    temporaire     <- liste[index]
    liste[index]   <- liste[dernier]
    liste[dernier] <- temporaire
    Retourner index
FinFonction

Function quicksort (liste, premier, dernier)
    Si premier < dernier
    Alors
        // ici j'assume la présence d'une fonction "Random" qui renvoie un entier aléatoire
        // compris entre les paramètres premier et dernier (inclusif) 
        pivot <- Random(premier, dernier)
        pivot <- partition(liste, premier, dernier, pivot)
    FinSi
    quicksort(liste, premier, pivot - 1)
    quicksort(liste, pivot + 1, dernier)
FinFunction

quicksort(tableau, 0, Longueur(tableau) - 1)
```
