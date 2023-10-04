# Exercice 2.1

Quel résultat produit le programme suivant ?
Variables val, double en Numériques
Début
Val ← 231
Double ← Val * 2
Ecrire Val
Ecrire Double
Fin

Réponse:  
Le résultat est l'affichage de la valeur de la variable "Val" qui est 231 et ensuite l'affichage de la valeur de la variable "Double" qui est 462.


# Exercice 2.2

Ecrire un programme qui demande un nombre à l’utilisateur, puis qui calcule et affiche le carré de
ce nombre.

Réponse:
Début
nombre <- Lire
carré <- nombre * nombre
Ecrire carré
Fin


# Exercice 2.3

Ecrire un programme qui lit le prix HT d’un article, le nombre d’articles et le taux de TVA, et qui
fournit le prix total TTC correspondant. Faire en sorte que des libellés apparaissent clairement.

Réponse:  
Début
ht     <- Lire
nombre <- Lire
tva    <- Lire / 100
ttc    <- ht + ( ht * tva )
Ecrire ttc * nombre
Fin


# Exercice 2.4

Ecrire un algorithme utilisant des variables de type chaîne de caractères, et affichant quatre
variantes possibles de la célèbre « belle marquise, vos beaux yeux me font mourir d’amour ». On ne
se soucie pas de la ponctuation, ni des majuscules

Réponse:  
Début
chaine1 <- "belle marquise"
chaine2 <- "vos beaux yeux"
chaine3 <- "me font mourrir"
chaine4 <- "d'amour"

// vos beaux yeux me font mourrir d'amour belle marquise
Ecrire chaine2 + chaine3 + chaine4 + chaine1
// vos beaux yeux belle marquise me font mourrir d'amour
Ecrire chaine2 + chaine1 + chaine3 + chaine4
// d'amour vos beaux yeux me font mourrir d'amour belle marquise
Ecrire chaine4 + chaine2 + chaine3 + chaine1
// belle marquise d'amour vos beaux yeux me font mourrir
Ecrire chaine1 + chaine4 + chaine2 + chaine3
Fin
