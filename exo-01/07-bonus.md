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


# Exercice 7.19

Écrire un algo de tri par tas (heapsort) [article wikipédia](https://fr.wikipedia.org/wiki/Tri_par_tas)

Réponse:  


# Exercice 7.20

Écrire un algo de tri par pivot (quicksort) [article wikipédia](https://fr.wikipedia.org/wiki/Tri_rapide)

Réponse:  
