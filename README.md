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

Pour l'installer, vous devez cloner le référentiel Git, puis exécuter la commande "composer install". Assurez-vous d'avoir préalablement installé Moment.js et Inertia.js.

Les principales fonctions pour le CRUD se trouvent dans le contrôleur EventController. Un scope a été créé dans le modèle "Événement" pour effectuer le filtrage. Pour lancer le projet, vous devez effectuer la migration de la base de données en exécutant la commande "php artisan migrate". Ensuite, lancez le serveur en utilisant la commande "php artisan serve". Enfin, pour compiler les ressources JavaScript, exécutez "npm run dev".

Un composant "DateRangePicker" a été créé parmi les composants Vue. Ce composant est utilisé dans le fichier Index.vue.

Grâce à ce composant, vous pourrez trier les événements en fonction de la date de leur début.
