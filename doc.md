# Jeu de GO

Url: https://github.com/RoxBow/Go-al  

Explication: 

Le projet est composé de :
* Dossier **public** qui contient les assets c'est-à-dire les fichiers de style et les scripts 

* Dossier **models** qui contient toutes les Class

* L'index qui la base du projet


Le dossier models est composé de différent Class soit: 

* Board représente le Goban et s'occupe de tout l'affichage du plateau

* Game représente le jeu en général et gère les propriétés globals

* Player qui représente un joueur du jeu ainsi que son score

* Stone, une pierre du plateau

Résultat: 

Une première étape d'un jeu de Go (9*9), vous pouvez éliminer un pion en l'encerclant.

Nos règles: 

Vous gagnez un point, lorsque vous "manger" un pion adverse.

Comment cela fonctionne:

On affiche un plateau de jeu sur lequel vous pouvez placer un pion où vous voulez. Lors de votre clic, les coordonnées sont envoyées pour être traitées et enregistrées dans chaque objet Pion ainsi que dans un tableau récapitulant le contenu du plateau de jeu.

