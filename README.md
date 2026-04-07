# Stubborn Shop

Projet Symfony e-commerce réalisé dans le cadre de la formation.

## Fonctionnalités

- Authentification (login/register)
- Gestion des produits
- Panier
- Back-office admin

## Lancer le projet

```bash
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
symfony server:start
