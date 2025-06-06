# Miam

**Miam** est une application web de gestion et partage de recettes de cuisine, développée en **Laravel** (architecture MVC) avec du **CSS** pour le design.

## 🍴 Fonctionnalités principales

- Gestion des utilisateurs (inscription, connexion, profils)
- Création, modification et suppression de recettes par les utilisateurs
- Partage des recettes entre utilisateurs
- Interface simple et intuitive

## ⚙️ Technologies utilisées

- PHP (Laravel)
- CSS
- MySQL (ou autre base de données compatible)
- Composer (gestionnaire de dépendances PHP)

## 🚀 Installation

### Prérequis

- PHP >= 8.0
- Composer
- Serveur web (Apache, Nginx)
- Base de données MySQL (ou compatible)

### Étapes

Cloner le dépôt :
```bash
git clone https://github.com/MathF94/miam.git
cd miam
```

Installer les dépendances :
```bash
composer install

Copier le fichier d’environnement :
```bash
cp .env.example .env
Configurer .env avec vos informations de base de données.

Générer la clé d’application :
```bash
php artisan key:generate

Lancer les migrations pour créer la base de données :
```bash
php artisan migrate

Lancer le serveur local :
```bash
php artisan serve
