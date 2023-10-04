# Exercice 1.1

Quelles seront les valeurs des variables A et B après exécution des instructions suivantes ?
Variables A, B en Entier
```
Début
A ← 1
B ← A + 3
A ← 3
Fin
```

Réponse:  
```
A == 3  
B == 4  
```


# Exercice 1.2

Quelles seront les valeurs des variables A, B et C après exécution des instructions suivantes ?
Variables A, B, C en Entier
```
Début
A ← 5
B ← 3
C ← A + B
A ← 2
C ← B - A
Fin
```

Réponse:  
```
A == 2  
B == 3  
C == 1  
```


# Exercice 1.3

Quelles seront les valeurs des variables A et B après exécution des instructions suivantes ?
Variables A, B en Entier
```
Début
A ← 5
B ← A + 4
A ← A + 1
B ← A - 4
Fin
```

Réponse:  
```
A == 6  
B == 2  
```


# Exercice 1.4

Quelles seront les valeurs des variables A, B et C après exécution des instructions suivantes ?
Variables A, B, C en Entier
```
Début
A ← 3
B ← 10
C ← A + B
B ← A + B
A ← C
Fin
```

Réponse:  
```
A == 13  
B == 13  
C == 13  
```


# Exercice 1.5

Quelles seront les valeurs des variables A et B après exécution des instructions suivantes ?
Variables A, B en Entier
```
Début
A ← 5
B ← 2
A ← B
B ← A
Fin
```

Réponse:  
```
A == 2  
B == 2  
```


Moralité : les deux dernières instructions permettent-elles d’échanger les deux valeurs de B et A ? Si
l’on inverse les deux dernières instructions, cela change-t-il quelque chose ?

Réponse:  
Les valeurs de A et B ne sont pas échangées.  
En inversant les instructions ça change les valeurs de A et B qui valeraient 5.


# Exercice 1.6

Plus difficile, mais c’est un classique absolu, qu’il faut absolument maîtriser : écrire un algorithme
permettant d’échanger les valeurs de deux variables A et B, et ce quel que soit leur contenu
préalable.

Réponse:  
```
Début  
A <- 2
B <- 3
// début de l'inversion des valeurs de A et B
C <- A
A <- B
B <- C
Fin  
```


# Exercice 1.7

Une variante du précédent : on dispose de trois variables A, B et C. Ecrivez un algorithme
transférant à B la valeur de A, à C la valeur de B et à A la valeur de C (toujours quels que soient les
contenus préalables de ces variables).

Réponse:  
```
Début
A <- 1
B <- 2
C <- 3
// Début du transfert de valeurs entre A, B et C
D <- C
C <- B
B <- A
A <- D
Fin
```

# Exercice 1.8

Que produit l’algorithme suivant ?
Variables A, B, C en Caractères
```
Début
A ← "423"
B ← "12"
C ← A + B
Fin
```

Réponse:  
La variable C contient la concaténation de texte: "42312"


# Exercice 1.9

Que produit l’algorithme suivant ?
Variables A, B, C en Caractères
```
Début
A ← "423"
B ← "12"
C ← A & B
Fin
```

Réponse:  
L'utilisation de l'opérateur logique "&" n'est pas claire dans ce contexte.  
Je suppose que la valeur de C est "12".
