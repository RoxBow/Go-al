# Jeu de GO

Url: https://github.com/RoxBow/Go-al

Explication: 

Le projet est composé de :
* Dossier **public** qui contient les assets c'est-à-dire les fichiers de style et les scripts 

* Dossier **models** qui contient toutes les Class

* L'index.php est la vue du jeu


Le dossier models est composé de différent Class soit: 

* Board représente le Goban et s'occupe de tout l'affichage du plateau

* Game représente le jeu en général et gère les propriétés globals et tous les autres objets du jeu 

* Player qui représente un joueur du jeu ainsi que son score

Résultat: 

Une première étape d'un jeu de Go (9*9), vous pouvez éliminer un pion en l'encerclant.

Nos règles: 

Vous gagnez un point, lorsque vous "manger" un pion adverse en l'entourant de 4 pions de couleur inverse.

1 tour est ajouté lorsque les 2 joueurs ont joué

Comment cela fonctionne:

On affiche le plateau de jeu (goban) sur lequel on peut placer un pion où l'on veut tant que la case est disponible.  
Lors du clic, les coordonnées sont envoyées pour être traitées et enregistrées dans un tableau qui représente le goban avec sur chaque case les couleurs noirs, blanc ou vide.

**/!\ Le bouton reset game permet de kill la session et ainsi réinitialiser le jeu**