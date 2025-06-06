Miam est une application web de gestion et partage de recettes de cuisine, développée en Laravel (architecture MVC) avec du CSS pour le design.

Fonctionnalités principales
    Gestion des utilisateurs (inscription, connexion, profils)
    Création, modification et suppression de recettes par les utilisateurs
    Partage des recettes entre utilisateurs
    Interface simple et intuitive

Technologies utilisées
    PHP (Laravel)
    CSS
    MySQL (ou autre base de données utilisée)
    Composer (pour la gestion des dépendances)

Installation
Prérequis
    PHP >= 8.0
    Composer
    Serveur web (Apache, Nginx)
    Base de données MySQL ou compatible

Installation
    Cloner le dépôt :
        git clone https://github.com/MathF94/miam.git
        cd miam/

    Installer les dépendances :
        composer install

    Configurer le fichier .env (copier .env.example et adapter la configuration base de données, mail, etc    
    
    Générer la clé d’application :
        php artisan key:generate

    Lancer les migrations pour créer la base de données :
        php artisan migrate

    Lancer le serveur local :
        php artisan serve
