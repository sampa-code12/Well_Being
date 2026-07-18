# WellBeing

WellBeing est une application web Laravel conçue pour une association de bien-être. Elle combine une vitrine institutionnelle, un espace membre et un espace administrateur pour gérer les contenus, les messages et les avis publics.

> Ce document présente l’architecture, les fonctionnalités, les flux utilisateurs et les bonnes pratiques de maintenance de la plateforme afin de faciliter sa compréhension, son évolution et sa transmission à une autre équipe.

## Sommaire
- [1. Présentation du projet](#1-présentation-du-projet)
- [2. Fonctionnalités principales](#2-fonctionnalités-principales)
- [3. Stack technique](#3-stack-technique)
- [4. Architecture technique](#4-architecture-technique)
- [5. Structure du projet](#5-structure-du-projet)
- [6. Installation et lancement](#6-installation-et-lancement)
- [7. Routes principales](#7-routes-principales)
- [8. Modèle de données et logique métier](#8-modèle-de-données-et-logique-métier)
- [9. Vues principales](#9-vues-principales)
- [10. Tableau de bord de contexte technique](#10-tableau-de-bord-de-contexte-technique)
- [11. Améliorations à venir](#11-améliorations-à-venir)
- [12. Version orientée recrutement et handover client](#12-version-orientée-recrutement-et-handover-client)
- [13. Développement et maintenance](#13-développement-et-maintenance)
- [14. Contribution](#14-contribution)

## 1. Présentation du projet

Ce projet a pour objectif de fournir :
- une présence en ligne professionnelle pour l’association,
- une page de présentation des programmes et services,
- un espace membre pour interagir avec la plateforme,
- un tableau de bord administrateur pour superviser les données clés.

### Objectif fonctionnel
Le système permet de :
- présenter les services et programmes de l’association,
- enregistrer des utilisateurs avec un rôle administrateur ou membre,
- permettre aux membres de publier des avis,
- permettre à l’administrateur de consulter et de gérer les avis et messages,
- configurer certains paramètres système depuis l’interface admin.

---

## 2. Fonctionnalités principales

### Front office
- page d’accueil,
- page à propos,
- page programmes/services,
- page de contact,
- page de consultation des avis publics.

### Authentification
- inscription d’un utilisateur,
- connexion sécurisée,
- redirection automatique selon le rôle utilisateur.

### Espace membre
- accessibilité à un dashboard dédié,
- consultation de son profil,
- consultation de ses avis et messages,
- publication d’un avis,
- envoi de messages.

### Espace administrateur
- tableau de bord de supervision,
- statistiques globales,
- consultation des avis,
- consultation des messages reçus,
- gestion des paramètres système,
- gestion des utilisateurs.

---

## 3. Stack technique

- PHP 8.2+
- Laravel 12
- Blade templates
- Bootstrap
- Composer
- npm
- MySQL / SQLite selon l’environnement

---

## 4. Architecture technique

Le projet suit une architecture Laravel MVC classique :
- routes dans [routes/web.php](routes/web.php),
- contrôleurs dans [app/Http/Controllers](app/Http/Controllers),
- modèles dans [app/Models](app/Models),
- vues Blade dans [resources/views](resources/views),
- migrations dans [database/migrations](database/migrations).

### Composants principaux
- [app/Http/Controllers/AdminController.php](app/Http/Controllers/AdminController.php) : logique du tableau de bord administrateur.
- [app/Http/Controllers/MemberController.php](app/Http/Controllers/MemberController.php) : logique de l’espace membre.
- [app/Http/Controllers/AvisController.php](app/Http/Controllers/AvisController.php) : gestion des avis.
- [app/Services/WellBeingProgramService.php](app/Services/WellBeingProgramService.php) : logique centralisée des programmes et métriques.
- [app/Models/User.php](app/Models/User.php) : modèle utilisateur avec rôles.
- [app/Models/Avis.php](app/Models/Avis.php) : modèle des avis.
- [app/Models/Message.php](app/Models/Message.php) : modèle des messages.
- [app/Models/SystemSetting.php](app/Models/SystemSetting.php) : paramètres système dynamiques.

---

## 5. Structure du projet

```text
app/
  Http/Controllers/
  Models/
  Services/
  Enums/
resources/
  views/
  css/
  js/
routes/
database/
  migrations/
  seeders/
tests/
```

### Dossiers clés
- [app/Http/Controllers](app/Http/Controllers) : logique applicative
- [app/Models](app/Models) : modèles Eloquent
- [resources/views](resources/views) : templates Blade
- [database/migrations](database/migrations) : structure de la base de données
- [database/seeders](database/seeders) : données de démarrage

---

## 6. Installation et lancement

### Prérequis
- PHP 8.2+
- Composer
- Node.js et npm
- une base de données compatible (MySQL ou SQLite)

### Étapes d’installation

1. Cloner le dépôt
```bash
git clone <url-du-repo> WellBeing
cd WellBeing
```

2. Installer les dépendances PHP
```bash
composer install
```

3. Créer le fichier d’environnement
```bash
cp .env.example .env
```

4. Générer la clé de l’application
```bash
php artisan key:generate
```

5. Configurer la base de données dans le fichier `.env`
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wellbeing
DB_USERNAME=root
DB_PASSWORD=secret
```

6. Exécuter les migrations et seeders
```bash
php artisan migrate --seed
```

7. Installer les assets front-end
```bash
npm install
npm run build
```

8. Démarrer l’application
```bash
php artisan serve
```

L’application sera accessible à :
```text
http://127.0.0.1:8000
```

---

## 7. Routes principales

| Route | Description |
| --- | --- |
| `/` | page d’accueil |
| `/apropos` | page À propos |
| `/programmes` | page des programmes |
| `/contact` | page de contact |
| `/register-form` | formulaire d’inscription |
| `/login` ou `/login-form` | connexion |
| `/admin/dashboard` | tableau de bord administrateur |
| `/membre/dashboard` | tableau de bord membre |
| `/avis` | consultation et publication des avis |

---

## 8. Modèle de données et logique métier

### Entités principales
- `users` : utilisateurs du système, avec rôle `admin` ou `membre`
- `avis` : commentaires publiés par les membres
- `messages` : messages internes / de contact
- `services` : services proposés par l’association
- `system_settings` : paramètres système configurables

### Logique métier importante
- les rôles déterminent l’accès aux espaces admin et membre,
- les avis sont enregistrés avec un statut de modération,
- l’admin peut activer ou désactiver certaines fonctionnalités système,
- les avis sont visibles sur la page publique selon leur statut.

---

## 9. Vues principales

Les vues sont organisées par contexte :
- [resources/views/index.blade.php](resources/views/index.blade.php) : page d’accueil
- [resources/views/apropos.blade.php](resources/views/apropos.blade.php) : présentation de l’association
- [resources/views/contact.blade.php](resources/views/contact.blade.php) : formulaire/contact
- [resources/views/avis/list.blade.php](resources/views/avis/list.blade.php) : affichage des avis publics
- [resources/views/admin/dashboard.blade.php](resources/views/admin/dashboard.blade.php) : dashboard admin
- [resources/views/membre/dashboard.blade.php](resources/views/membre/dashboard.blade.php) : dashboard membre

---

## 10. Tableau de bord de contexte technique

| Domaine | État actuel | Niveau de maturité | Observation |
| --- | --- | --- | --- |
| Architecture | Laravel MVC classique | Moyen | Structure claire et compréhensible |
| Authentification | Implémentée | Moyen | Fonctionnelle, mais à renforcer |
| Gestion des avis | Implémentée | Moyen | Logique de base bien en place |
| Gestion des messages | Implémentée | Moyen | Fonctionnelle, mais encore simple |
| Administration | Implémentée | Moyen | Dashboard utile, encore perfectible UX |
| Design / UX | Partiellement structuré | Moyen | Basé sur Bootstrap et templates Blade |
| Tests automatisés | Limités | Faible | À renforcer pour la robustesse |
| Extensibilité | Bonne base | Moyen | Le projet peut évoluer sans refonte majeure |

---

## 11. Améliorations à venir

### Priorité haute
- améliorer l’ergonomie du dashboard admin,
- remplacer certains éléments statiques par des composants Blade réutilisables,
- renforcer la gestion de la modération des avis,
- ajouter des tests automatisés sur les flux clés.

### Priorité moyenne
- introduire des politiques d’accès plus fines,
- améliorer la cohérence visuelle entre les vues,
- centraliser davantage la logique métier dans des services,
- ajouter une meilleure gestion des erreurs utilisateur.

### Priorité basse
- mettre en place une API plus structurée,
- ajouter une couche de notification avancée,
- préparer une version plus robuste pour une mise en production complète.

---

## 12. Version orientée recrutement et handover client

### Valeur métier
WellBeing est un projet orienté produit et impact utilisateur. Il répond à une vraie besoin : offrir une plateforme simple, moderne et fonctionnelle pour une association qui souhaite mieux structurer sa présence en ligne et ses interactions avec ses membres.

### Valeur technique
Le projet montre une capacité à :
- construire une application Laravel complète,
- organiser une architecture MVC propre,
- gérer des rôles utilisateurs,
- travailler sur des workflows métier concrets comme les avis et la messagerie,
- produire une base maintenable pour une évolution future.

### Positionnement pour un recruteur ou un client
Ce projet peut être présenté comme :
- une application web Laravel fonctionnelle et cohérente,
- un socle technique évolutif,
- un exemple de développement full-stack orienté produit,
- une base solide pour une transformation vers une plateforme plus complète et plus robuste.

---

## 13. Développement et maintenance

### Bonnes pratiques
- garder la logique métier hors des vues Blade,
- utiliser les migrations pour toute modification de base,
- conserver une séparation claire entre contrôleurs, modèles et vues,
- ajouter des tests si de nouvelles fonctionnalités sont développées.

### Commandes utiles
```bash
php artisan migrate
php artisan test
php artisan route:list
php artisan config:clear
php artisan view:clear
```

### Débogage
En cas de problème, vérifier :
- le fichier [/.env](.env),
- les logs dans [storage/logs](storage/logs),
- la cohérence des migrations et des modèles.

---

## 14. Contribution

Pour contribuer au projet :
1. créer une branche dédiée,
2. implémenter les changements proprement,
3. tester les fonctionnalités impactées,
4. ouvrir une pull request avec une description claire.

---

## 12. Licence

Ce projet est distribué sous licence MIT.
