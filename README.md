# STI - Projet 1 - Mailbox

*Auteurs : Walid Koubaa et Romain Gallay*

L'application web est prévue pour tourner sur un docker. Le déploiement se fait simplement en lançant le script "start.sh" qui se trouve à la racine du projet. Celui effectue les actions suivantes : 
* Il commence par arrêter puis effacer un éventuel container nommé sti_project qui tournerait sur la machine.
* Il télécharge une image, lance un conteneur nommé sti_project, relie de manière dynamique le répertoire "site" local avec "/usr/shar/ nginx" dans l’image, relie le port 8080 de votre ordinateur hôte vers le port 80 sur votre conteneur et renomme l’hôte virtuel du conteneur comme "sti". 
* Il lance les services web et php. 
* Il ajoute des droits sur la database pour que celle-ci soit modifiable par l'application.

On peut ensuite accéder au site sur le port 8080 de votre machine docker.
Différents comptes existent pour se log, on peut notamment utiliser le compte collaborateur "user" avec password "user" ou le compte administateur "root" avec password "root".
