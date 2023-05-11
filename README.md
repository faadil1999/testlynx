<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<img src="https://raw.githubusercontent.com/inertiajs/.github/master/LOGO.png">
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## LynxEventTest
Il s'agit d'un programme réalisé en Laravel et Inertia.js qui permet d'ajouter, de modifier, de supprimer et de filtrer des événements.
Les principales fonctions pour le CRUD se trouvent dans le contrôleur `EventController`. Un scope a été créé dans le modèle `Evenement` pour effectuer le filtrage. 
Un composant `DateRangePicker` a été créé parmi les composants Vue. Ce composant est utilisé dans le fichier Index.vue.
Grâce à ce composant, vous pourrez trier les événements en fonction de la date de leur début.

## Pour commencer
S'assurer vous d'avoir des extension sur votre visual studio telles que Laravel blade formatter, vue 3 snippets, Moment.js snippets
Cloner le référentiel Git en faisant: git clone [url_https]
```
git clone [url_https]
```
Copier les elements du fichier `.env.example` dans un fichier `.env` que vous créez
### Pré-requis

Ce qu'il est requis pour commencer avec ce projet

- Php 8
- Composer
- Node js (npm)
- phpMyAdmin

### Installation
Dans votre terminal, vous vous situez a la racine du projet et vous exécutez la commande 
```
composer install
```
en suite vous faites
```
php artisan key:generate
```
en suite vous faites
```
npm install
```
## Démarrage
Pour demarrer le projet il faut d'abord faire la migration du projet en faisant
```
php artisan migrate
```
Il faut s'assurer au préalable d'avoir modifié le nom de la base de données dans le fichier `.env` en modifiant la variable `DB_DATABASE`.
Ensuite, lancez le serveur en utilisant la commande 
```
php artisan serve
```
Enfin, pour compiler les ressources JavaScript, exécutez 
```
npm run dev
```


