<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## L2IS - Projet Web Application

### Description du projet

Ce projet est une application web pour le **Laboratoire d'Ingénierie Informatique et Systèmes** (L2IS) de la FST Marrakech. Il permet de gérer diverses informations concernant le laboratoire, ainsi que les actualités et les événements.

### Fonctionnalités

#### Partie Publique :

-   **Accueil** : Présentation du laboratoire et des actualités récentes ainsi que les offres d'emplois.
-   **Organisation** : Informations sur le directeur du laboratoire.
-   **Équipes de Recherches** : Présentation des équipes de recherche ainsi que leurs axes de recherches.
-   **Personnel** : Liste du personnel du laboratoire (membres actuels et anciens).
-   **Publications** : Accès aux publications du laboratoire.
-   **Projets Industriels** : Informations sur les projets en cours et terminé.
-   **Événements** : Liste des séminaires.
-   **Informations** : Diverses informations pour les visiteurs.
    URL de la page de connexion : [http://localhost:5173/login](http://localhost:5173/login)

#### Partie Administration :

-   Gestion des utilisateurs .
-   Gestion des actualités (ajout, modification, suppression).
-   Gestion des offres d'emplois.
-   Gestion des membres.
-   Gestion des équipes.
-   Gestion des événements.
-   Gestion des publications et des projets.
-   Statistiques et rapports.

### Identifiants et Accès

#### Espace Administrateur :

-   **Email** :directeurlaboratoirel2is@gmail.com
-   **Mot de passe** : directeurlabo123456
-   **Rôle** : Administrateur

#### Espace Utilisateur (Membre) :

-   **Email** : saraquassimi1@gmail.com
-   **Mot de passe** : saralabo2026
-   **Rôle** : Utilisateur

### Prérequis

-   **PHP** : 7.2.24
-   **MySQL** : 5.7.41

### Installation

#### Backend (Laravel)

Pour installer le projet localement, suivez ces étapes :

1. Clonez le dépôt :

    git clone <URL_DU_DEPOT>

2. Accédez au dossier du projet :

    cd votre-projet-laravel

3. Installez les dépendances :

    composer install

4. Configurez votre fichier .env avec les informations de votre base de données.

5. Exécutez les migrations :

    php artisan migrate

6. Démarrez le serveur local :

    php artisan serve

#### Frontend (React)

Pour installer le projet front-end, suivez ces étapes :

1. Accédez au dossier du front-end :
   cd votre-projet-laravel/frontend

2. Installez les dépendances avec NPM

npm install

3. Démarrez le serveur de développement :

npm start

### Gestion des images

Si les images ne s'affichent pas correctement sur votre application, il est recommandé de recréer le répertoire intermédiaire `storage`. Pour ce faire, suivez ces étapes :

1. Assurez-vous d'avoir un lien symbolique vers le dossier de stockage :

    ```bash
    php artisan storage:link
    ```

### Importer la base de données

1. Ouvrez **phpMyAdmin** ou utilisez un autre outil de gestion MySQL.
2. Créez une nouvelle base de données (si elle n'existe pas encore).
3. Accédez à l'onglet **Importer** dans phpMyAdmin et sélectionnez le fichier SQL situé dans `database/sql/l2is.sql`.
4. Cliquez sur **Exécuter** pour importer la base de données.
5. Mettez à jour votre fichier `.env` avec les informations de connexion à la base de données :

    ```env
    DB_DATABASE=nom_de_votre_nouvelle_base_de_donnees
    DB_USERNAME=votre_nom_utilisateur_mysql
    DB_PASSWORD=votre_mot_de_passe_mysql
    ```
