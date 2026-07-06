# Well Being

Well Being est une application web Laravel conçue pour une association de bien-être. Elle met en valeur des services, des avis, une présentation institutionnelle et des espaces dédiés pour les administrateurs et les membres.

## Présentation

- Objectif : offrir une vitrine en ligne pour l'association Well Being et des tableaux de bord dédiés aux deux types d'utilisateurs : admin et membre.
- Contenu : pages publiques, formulaire de contact, fiches services, dashboard administrateur, dashboard membre.
- Technologies : Laravel, Blade, Bootstrap, JavaScript, CSS, base de données MySQL / SQLite.

## Fonctionnalités principales

- Pages publiques : accueil, à propos, services, contact.
- Authentification simple dans les routes existantes `login` / `register`.
- Dashboards anonymes de démonstration pour les rôles `admin` et `membre`.
- Templates Blade avec design inspiré du thème Well Being.
- Structure de projet Laravel standard avec contrôleurs, migrations, modèles et vues.

## Prérequis

- PHP 8.1+ recommandé
- Composer
- Node.js 16+ / npm (pour l'installation des assets si nécessaire)
- Base de données compatible MySQL, MariaDB ou SQLite

## Installation

1. Cloner le dépôt :

```bash
git clone <url-du-repo> well-being
cd well-being
```

2. Installer les dépendances PHP :

```bash
composer install
```

3. Copier le fichier d'environnement :

```bash
copy .env.example .env
```

4. Générer la clé d'application :

```bash
php artisan key:generate
```

5. Configurer la connexion à la base de données dans `.env` :

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wellbeing
DB_USERNAME=root
DB_PASSWORD=secret
```

6. Exécuter les migrations et les seeders :

```bash
php artisan migrate --seed
```

7. Installer les assets front-end si nécessaire :

```bash
npm install
npm run build
```

> Si vous n'utilisez pas npm, les styles et scripts sont déjà référencés depuis le dossier `public/assets`.

## Lancer l'application

```bash
php artisan serve
```

L'application sera accessible sur `http://127.0.0.1:8000`.

## Routes principales

| Route | Vue / Fonctionnalité |
| --- | --- |
| `/` | Page d'accueil |
| `/apropos` | Page À propos |
| `/services` | Page des services |
| `/contact` | Page de contact |
| `/login` | Page de connexion |
| `/register` | Page d'inscription |
| `/admin/dashboard` | Tableau de bord admin (vue statique) |
| `/membre/dashboard` | Tableau de bord membre (vue statique) |

## Structure de l'application

- `app/Http/Controllers/` : contrôleurs applicatifs
- `app/Models/` : modèles Eloquent
- `resources/views/` : vues Blade
- `resources/css/` et `resources/js/` : sources front-end
- `public/assets/` : ressources CSS/JS/images du thème
- `routes/web.php` : définition des routes publiques
- `database/migrations/` : migrations de la base de données
- `database/seeders/` : chargeurs de données initiales

## Vues clés

- `resources/views/index.blade.php` : page d'accueil du site
- `resources/views/apropos.blade.php` : page À propos
- `resources/views/services.blade.php` : page des services
- `resources/views/contact.blade.php` : page de contact
- `resources/views/admin/dashboard.blade.php` : dashboard administrateur
- `resources/views/membre/dashboard.blade.php` : dashboard membre

## Design et cohérence

Le thème visuel utilise :

- Bootstrap pour la grille et les composants
- `assets/css/main.css` pour les styles personnalisés
- `bootstrap-icons` pour les icônes
- une palette de couleurs douce et naturelle adaptée au bien-être

Les dashboards admin et membre reprennent le style général du site avec :

- une barre latérale fixe
- une carte de profil
- des blocs de statistiques et actions rapides
- un rendu responsive pour tablettes et mobiles

## Base de données

La base de données gère plusieurs entités :

- `users` : utilisateurs du système
- `services` : services proposés par l'association
- `avis` : retours et commentaires des utilisateurs

### Migrations existantes

- `0001_01_01_000000_create_users_table.php`
- `0001_01_01_000001_create_cache_table.php`
- `0001_01_01_000002_create_jobs_table.php`
- `2026_07_04_091447_add_role_to_users_table.php`
- `2026_07_04_171918_create_services_table.php`
- `2026_07_04_195837_create_avis_table.php`

## Contribuer

Pour contribuer au projet :

1. Forker le dépôt.
2. Créer une branche de fonctionnalité.
3. Ajouter du code clair et des commits atomiques.
4. Ouvrir une pull request décrivant les changements.

## Bonnes pratiques

- Respecter le format Blade et la séparation logique entre vues et contrôleurs
- Utiliser les migrations pour versionner la base de données
- Préférer les routes simples pour les pages publiques
- Ajouter des composants réutilisables quand le HTML se répète

## Remarques

- Les dashboards `admin` et `membre` sont actuellement statiques et conçus comme des maquettes d'interface.
- Aucune logique métier avancée n'est nécessaire pour l'instant dans ces vues.

## Licence

Ce projet est distribué sous la licence MIT.
