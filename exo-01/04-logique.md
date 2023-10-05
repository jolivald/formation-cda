# Exercice 4.1

Formulez un algorithme équivalent à l’algorithme suivant :
```
Si Tutu > Toto + 4 OU Tata = "OK" Alors
Tutu ← Tutu + 1
Sinon
Tutu ← Tutu – 1
Finsi
```

Réponse:  
```
Si Tutu - 4 <= Toto Et Tata != "OK" Alors
Tutu <- Tutu - 1
Sinon
Tutu <- Tutu + 1
FinSi
```


# Exercice 4.2

Cet algorithme est destiné à prédire l'avenir, et il doit être infaillible !
Il lira au clavier l’heure et les minutes, et il affichera l’heure qu’il sera une minute plus tard. Par
exemple, si l'utilisateur tape 21 puis 32, l'algorithme doit répondre :
"Dans une minute, il sera 21 heure(s) 33".
NB : on suppose que l'utilisateur entre une heure valide. Pas besoin donc de la vérifier.

Réponse:  
```
heures  <- Lire
minutes <- Lire + 1
Si minutes > 60 Alors
    heures  <- heures + (minutes / 60)
    minutes <- minutes % 60
FinSi
Ecrire "Dans une minute, il sera " + (heures % 24) + " heure(s) " + minutes
```


# Exercice 4.3

De même que le précédent, cet algorithme doit demander une heure et en afficher une autre. Mais
cette fois, il doit gérer également les secondes, et afficher l'heure qu'il sera une seconde plus tard.
Par exemple, si l'utilisateur tape 21, puis 32, puis 8, l'algorithme doit répondre : "Dans une seconde,
il sera 21 heure(s), 32 minute(s) et 9 seconde(s)".
NB : là encore, on suppose que l'utilisateur entre une date valide.

Réponse:  
```
heures   <- Lire
minutes  <- Lire
secondes <- Lire + 1
Si secondes > 60 Alors
    minutes  <- minutes + (secondes / 60)
    secondes <- secondes % 60
FinSi
Si minutes > 60 Alors
    heures  <- heures + (minutes / 60)
    minutes <- minutes % 60
FinSi
Ecrire "Dans une seconde, il sera " + heures + " heure(s), " + minutes + " minute(s) et " + secondes + " seconde(s)"
```


# Exercice 4.4

Un magasin de reprographie facture 0,10 E les dix premières photocopies, 0,09 E les vingt suivantes
et 0,08 E au-delà. Ecrivez un algorithme qui demande à l’utilisateur le nombre de photocopies
effectuées et qui affiche la facture correspondante.

Réponse:  
```
nombre <- Lire
prix   <- 0
Si nombre > 30 Alors
    prix <- (0.1 * 10) + (0.09 * 20) + (0.08 * (nombre - 30))
SinonSi nombre > 10 Alors
    prix <- (0.1 * 10) + (0.09 * (nombre - 10))
Sinon
    prix <- 0.1 * nombre
FinSi
Ecrire "le prix total est de: " + prix
```


# Exercice 4.5

Les habitants de Zorglub paient l’impôt selon les règles suivantes :
 - les hommes de plus de 20 ans paient l’impôt
 - les femmes paient l’impôt si elles ont entre 18 et 35 ans
 - les autres ne paient pas d’impôt

Le programme demandera donc l’âge et le sexe du Zorglubien, et se prononcera donc ensuite sur le
fait que l’habitant est imposable.

Réponse:  
```
age  <- Lire
sexe <- Lire
Si sexe == "homme" Et age > 20 Alors
    Ecrire "les hommes de plus de vingt ans sont imposables"
SinonSi sexe == "femme" Et age >= 18 Et age <= 35 Alors
    Ecrire "les femmes entre 18 et 35 ans sont imposables"
Sinon
    Ecrire "vous n'êtes pas imposable"
FinSi
```


# Exercice 4.6

Les élections législatives, en Guignolerie Septentrionale, obéissent à la règle suivante :
 - lorsque l'un des candidats obtient plus de 50% des suffrages, il est élu dès le premier tour.
 - en cas de deuxième tour, peuvent participer uniquement les candidats ayant obtenu au
moins 12,5% des voix au premier tour.

Vous devez écrire un algorithme qui permette la saisie des scores de quatre candidats au premier
tour. Cet algorithme traitera ensuite le candidat numéro 1 (et uniquement lui) : il dira s'il est élu,
battu, s'il se trouve en ballottage favorable (il participe au second tour en étant arrivé en tête à
l'issue du premier tour) ou défavorable (il participe au second tour sans avoir été en tête au premier
tour).

Réponse:  
```
score1 <- Lire
score2 <- Lire
score3 <- Lire
score4 <- Lire
total  <- score1 + score2 + score3 + score4
ratio  <- score1 / total
Si ratio > 0.5 Alors
    Ecrire "le candidat est élu"
SinonSi ratio > 0.125 Alors
    Si ratio < (score2 / total) Ou ratio < (score3 / total) Ou ratio < (score4 / total) Alors
        Ecrire "le candidat est en ballotage défavorable"
    Sinon
        Ecrire "le candidat est en ballotage favorable"
    FinSi
Sinon
    Ecrire "le candidate est battu"
FinSi
```


# Exercice 4.7

Une compagnie d'assurance automobile propose à ses clients quatre familles de tarifs identifiables
par une couleur, du moins au plus onéreux : tarifs bleu, vert, orange et rouge. Le tarif dépend de la
situation du conducteur :
 - un conducteur de moins de 25 ans et titulaire du permis depuis moins de deux ans, se voit
attribuer le tarif rouge, si toutefois il n'a jamais été responsable d'accident. Sinon, la
compagnie refuse de l'assurer.
 - un conducteur de moins de 25 ans et titulaire du permis depuis plus de deux ans, ou de plus
de 25 ans mais titulaire du permis depuis moins de deux ans a le droit au tarif orange s'il n'a
jamais provoqué d'accident, au tarif rouge pour un accident, sinon il est refusé.
 - un conducteur de plus de 25 ans titulaire du permis depuis plus de deux ans bénéficie du
tarif vert s'il n'est à l'origine d'aucun accident et du tarif orange pour un accident, du tarif
rouge pour deux accidents, et refusé au-delà
 - De plus, pour encourager la fidélité des clients acceptés, la compagnie propose un contrat
de la couleur immédiatement la plus avantageuse s'il est entré dans la maison depuis plus
d'un an.

Ecrire l'algorithme permettant de saisir les données nécessaires (sans contrôle de saisie) et de
traiter ce problème. Avant de se lancer à corps perdu dans cet exercice, on pourra réfléchir un peu
et s'apercevoir qu'il est plus simple qu'il n'en a l'air (cela s'appelle faire une analyse !)

Réponse:  
```
age        <- Lire
permis     <- Lire
accidents  <- Lire
ancienneté <- Lire
points     <- 0
Si age >= 25 Alors
    points <- points + 1
FinSi
Si permis > 2 Alors
    points <- points + 1
FinSi
points <- points - accidents
Si points > 0 Et ancienneté >= 1 Alors
    points <- points + 1
FinSi
Choix Sur points Faire
    3: Ecrire "tarif bleu"
    2: Ecrire "tarif vert"
    1: Ecrire "tarif orange"
    0: Ecrire "tarif rouge"
    Autrement: Ecrire "la compagnie refuse de vous assurer"
FinChoix
```


# Exercice 4.8

Ecrivez un algorithme qui, après avoir demandé un numéro de jour, de mois et d'année à
l'utilisateur, renvoie s'il s'agit ou non d'une date valide.
Cet exercice est certes d’un manque d’originalité affligeant, mais après tout, en algorithmique
comme ailleurs, il faut connaître ses classiques ! Et quand on a fait cela une fois dans sa vie, on
apprécie pleinement l’existence d’un type numérique « date » dans certains langages…).
Il n'est sans doute pas inutile de rappeler rapidement que le mois de février compte 28 jours, sauf si
l’année est bissextile, auquel cas il en compte 29. L’année est bissextile si elle est divisible par
quatre. Toutefois, les années divisibles par 100 ne sont pas bissextiles, mais les années divisibles
par 400 le sont. Ouf !
Un dernier petit détail : vous ne savez pas, pour l’instant, exprimer correctement en pseudo-code
l’idée qu’un nombre A est divisible par un nombre B. Aussi, vous vous contenterez d’écrire en bons
télégraphistes que A divisible par B se dit « A dp B ».

Réponse:  
```
jour  <- Lire
mois  <- Lire
année <- Lire
dateValide  <- vrai
bissextile  <- faux
joursDuMois <- [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]
Si année dp 4 Alors
    bissextile <- vrai
    Si année dp 100 et année !dp 400 Alors
        bissextile <- faux
    FinSi
FinSi
Si bissextile == vrai Alors
    joursDuMois[1] <- 29
FinSi
Si jour > joursDuMois[mois - 1] Et mois > 12 Et année > 2023 Alors
    Ecrire "la date n'est pas valide"
Sinon
    Ecrire "la date est valide"
FinSi
```
