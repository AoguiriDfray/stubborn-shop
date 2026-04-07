# Stubborn Shop

Projet Symfony de e-commerce pour la marque Stubborn.

## Fonctionnalités

- Inscription / Connexion
- Gestion des rôles utilisateur / admin
- Catalogue produits
- Fiche produit
- Ajout au panier avec choix de taille
- Suppression d’un article du panier
- Calcul du total
- Back-office administrateur
- Création / modification / suppression de produits
- Intégration Stripe (mode test)
- Tests fonctionnels Symfony

## Technologies utilisées

- Symfony
- PHP
- MySQL
- Twig
- Doctrine
- PHPUnit
- Stripe

## Installation

```bash
composer install
Configurer la base de données dans .env :
DATABASE_URL="mysql://root:@127.0.0.1:3306/stubborn_shop?serverVersion=8.4.0&charset=utf8mb4"

Lancer le projet
symfony serve

Créer la base
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

Charger les fixtures
php bin/console doctrine:fixtures:load

Tests
php bin/phpunit

Pages principales
	•	/
	•	/login
	•	/register
	•	/products
	•	/product/{id}
	•	/cart
	•	/admin

Auteur

Guilherme
---

# Étape suivante : doc PDF

Le sujet demande une **documentation PDF**.  
Le plus simple est de faire un document avec ces sections :

## Structure du PDF
1. Présentation du projet  
2. Choix techniques  
3. Fonctionnalités réalisées  
4. Authentification  
5. Gestion des produits  
6. Gestion du panier  
7. Paiement Stripe  
8. Tests  
9. Instructions d’installation  
10. Conclusion

---

# Texte prêt à mettre dans ta doc

Tu peux reprendre ça.

## Introduction
Le projet Stubborn Shop est une application e-commerce développée avec Symfony.  
Elle permet à un utilisateur de consulter des sweat-shirts, de créer un compte, de se connecter, d’ajouter des produits à un panier puis de simuler un paiement.  
Un administrateur dispose également d’un back-office lui permettant de gérer les produits.

## Choix techniques
Le projet a été développé avec Symfony, Doctrine et MySQL.  
Twig a été utilisé pour les vues.  
La gestion des utilisateurs repose sur le système de sécurité de Symfony.  
Le paiement a été préparé avec Stripe en mode test.

## Fonctionnalités réalisées
L’application contient :
- une page d’accueil avec présentation de la marque
- un menu dynamique selon l’état de connexion de l’utilisateur
- une page de connexion
- une page d’inscription
- une page listant tous les produits
- une page de détail d’un produit
- un panier avec ajout, suppression et calcul du total
- un back-office accessible uniquement à un administrateur
- la création, la modification et la suppression de produits
- une intégration Stripe pour simuler le paiement
- des tests fonctionnels

## Authentification
Le système d’authentification Symfony a été utilisé.  
Un utilisateur peut s’inscrire et se connecter.  
Le rôle `ROLE_ADMIN` permet d’accéder au back-office.  
Les utilisateurs non administrateurs ne peuvent pas accéder à la page `/admin`.

## Gestion des produits
Les produits sont stockés en base de données à l’aide de Doctrine.  
Chaque produit possède un nom, une description, un prix, un stock, une image, une taille et un statut “mis en avant”.  
L’administrateur peut ajouter, modifier ou supprimer un produit depuis le back-office.

## Gestion du panier
Le panier est stocké en session.  
L’utilisateur peut ajouter un produit avec une taille, consulter son panier, supprimer un article et visualiser le total de sa commande.

## Paiement Stripe
L’intégration Stripe a été préparée en mode test.  
Un service Symfony dédié a été créé pour gérer la redirection vers une session de paiement Stripe.

## Tests
Des tests fonctionnels ont été réalisés avec PHPUnit pour vérifier :
- l’accès aux pages principales
- le fonctionnement du panier
- l’ajout d’un produit au panier
- la suppression d’un article
- les pages de succès et d’annulation de paiement

## Installation
Le projet se lance avec :
- `composer install`
- configuration de `.env`
- création de la base avec Doctrine
- chargement des fixtures
- `symfony serve`

## Conclusion
Ce projet m’a permis de mettre en pratique la création d’une application e-commerce complète avec Symfony, en utilisant les bonnes pratiques du framework, la sécurité, Doctrine, Twig, les tests et une intégration de paiement.

---

# Étape suivante : check final du barème

Avant d’envoyer, vérifie ça :

## Auth /4
- `/login` fonctionne ✅
- `/register` fonctionne ✅
- session OK ✅
- MySQL OK ✅

## Produits /3
- `/products` liste les produits ✅
- `/product/{id}` détail produit ✅
- ajout panier avec taille ✅
- admin CRUD produit ✅

## Panier /3
- `/cart` fonctionne ✅
- suppression article ✅
- total calculé ✅
- bouton paiement ✅

## Application e-commerce /10
- accueil `/` ✅
- menu dynamique ✅
- wireframes à peu près respectés ✅
- service Stripe ✅
- tests ✅
- doc PDF ✅
- repo GitHub ✅

---

# Étape suivante concrète

Maintenant fais :
1. mets le `README.md`
2. crée le PDF avec le texte ci-dessus
3. commit/push
4. dernier check dans le navigateur

Commande Git :

```bash
git add .
git commit -m "Finalize Symfony ecommerce project"
git push