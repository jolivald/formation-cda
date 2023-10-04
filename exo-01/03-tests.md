# Exercice 3.1

Ecrire un algorithme qui demande un nombre à l’utilisateur, et l’informe ensuite si ce nombre est
positif ou négatif (on laisse de côté le cas où le nombre vaut zéro).

Réponse:  
Début
nombre <- Lire
Si nombre < 0 Alors
    Ecrire "le nombre est négatif"
Sinon
    Ecrire "le nombre est positif"
FinSi


# Exercice 3.2

Ecrire un algorithme qui demande deux nombres à l’utilisateur et l’informe ensuite si leur produit
est négatif ou positif (on laisse de côté le cas où le produit est nul). Attention toutefois : on ne doit
pas calculer le produit des deux nombres.

Réponse:  
nombre1 <- Lire
nombre2 <- Lire
produit <- nombre1 * nombre2
If produit < 0 Alors
    Ecrire "Le produit est négatif"
Sinon
    Ecrire "Le produit est positif"
FinSi


# Exercice 3.3

Ecrire un algorithme qui demande trois noms à l’utilisateur et l’informe ensuite s’ils sont rangés ou
non dans l’ordre alphabétique.

Réponse:  
Début
nom1 <- Lire
nom2 <- Lire
nom3 <- Lire
// Ici j'assume qu'il est possible d'indexer une chaine de caractères comme un tableau de caractères  
// Autre assomption: l'opérateur "<" est utilisé pour comparer la position dans l'alphabet de deux caractères
If nom1[0] < nom2[0] Et nom2[0]< nom3[0] Alors
    Ecrire "Les noms sont entrés par ordre alphabétique"
Sinon
    Ecrire "Les noms ne sont pas entrés par ordre alphabétique"
Fin


# Exercice 3.4

Ecrire un algorithme qui demande un nombre à l’utilisateur, et l’informe ensuite si ce nombre est
positif ou négatif (on inclut cette fois le traitement du cas où le nombre vaut zéro).

Réponse:
Début
nombre <- Lire
Si nombre == 0 Alors
    Ecrire "le nombre est zéro"
SinonSi nombre < 0 Alors
    Ecrire "le nombre est négatif"
Sinon
    Ecrire "le nombre est positif"
FinSi
Fin

# Exercice 3.5

Ecrire un algorithme qui demande deux nombres à l’utilisateur et l’informe ensuite si le produit est
négatif ou positif (on inclut cette fois le traitement du cas où le produit peut être nul). Attention
toutefois, on ne doit pas calculer le produit !

Réponse:  
nombre1 <- Lire
nombre2 <- Lire
Si nombre1 == 0 Ou nombre2 == 0 Alors
    Ecrire "le produit est nul"
SinonSi nombre1 < 0 Et nombre2 < 0 Alors
    Ecrire "le produit est positif"
SinonSi nombre1 < 0 Ou nombre2 < 0 Alors
    Ecrire "le produit est négatif"
Sinon
    Ecrire "le produit est positif"
FinSi



# Exercice 3.6

Ecrire un algorithme qui demande l’âge d’un enfant à l’utilisateur. Ensuite, il l’informe de sa
catégorie :
 - "Poussin" de 6 à 7 ans
 - "Pupille" de 8 à 9 ans
 - "Minime" de 10 à 11 ans
 - "Cadet" après 12 ans
Peut-on concevoir plusieurs algorithmes équivalents menant à ce résultat ?

Réponse:  
age <- Lire
Si age < 6 Alors
    Ecrire "pas de catégorie pour les enfants de moins de 6 ans"
SinonSi <= 7 Alors
    Ecrire "Poussin"
SinonSi <= 9 Alors
    Ecrire "Pupille"
SinonSi <= 11 Alors
    Ecrire "Minime"
Sinon
    Ecrire "Cadet"
FinSi
