Petit exercice pour aujourd'hui et demain : 
Faire un système de gstion de carte pour un board kanban.
https://fr.wikipedia.org/wiki/Kanban
https://www.atlassian.com/fr/agile/kanban/boards

Mettre en place la mongo avec plusieurs collections, soit à minima : 
Users
Boards

Mettre en place un serveur node avec des routes pour : 
CRUD sur les utilisateurs
CRUD sur les boards
CRUD sur les cards

Un système d'authentification, de gestion d'utilisateurs et de droits (rôles) (serveur pour le moment) :
Un rôle d'administration de l'app qui pourra gérer (créer, modifier, supprimer) les users. (les comptes de ce rôle ne devront pas contenir admin, root dans leur nom
Un rôle scrum master qui pourra gérer des boards et des cards, inviter des users sur des boards, changer les cards de colonnes
Un rôle user qui pourra créer et modifier des cartes et donc les changer d'état mais ne pourra pas les supprimer.

Le système de sécurité se basera dans un premier temps sur un simple couple login/password hashé.