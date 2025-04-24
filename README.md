# Application de Gestion des Voyageurs - Laravel 10

Une application web complète pour la gestion des voyageurs, séjours et hébergements, développée avec Laravel 10.

## Fonctionnalités

- **Gestion des voyageurs**: Ajout, modification, suppression et consultation des informations des voyageurs
- **Gestion des séjours**: Planification et suivi des séjours associés aux voyageurs
- **Gestion des hébergements**: Organisation et suivi des lieux d'hébergement disponibles
- **Système de recherche avancé**: Filtrage par de multiples critères pour chaque entité
- **Interface responsive**: Design adaptatif pour une utilisation sur tous les appareils
- **Gestion des photos**: Upload et affichage des photos pour les hébergements

## Prérequis

- PHP >= 8.1
- Composer
- MySQL ou MariaDB
- Node.js et NPM (pour les assets)

## Installation

1. Clonez le dépôt:
```bash
git clone https://github.com/votre-username/gestion-voyageurs.git
cd gestion-voyageurs
```

2. Installez les dépendances:
```bash
composer install
npm install && npm run dev
```

3. Copiez le fichier d'environnement et configurez votre base de données:
```bash
cp .env.example .env
```

4. Générez une clé d'application:
```bash
php artisan key:generate
```

5. Configurez votre fichier `.env` avec vos informations de base de données:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_voyage
DB_USERNAME=root
DB_PASSWORD=
```

6. Effectuez les migrations pour créer les tables:
```bash
php artisan migrate
```

7. Créez un lien symbolique pour le stockage:
```bash
php artisan storage:link
```

8. Lancez le serveur de développement:
```bash
php artisan serve
```

## Structure de la base de données

### Table `voyageurs`
- `id_voyageur` (clé primaire)
- `nom` - Nom du voyageur
- `prenom` - Prénom du voyageur
- `ville` - Ville de résidence
- `genre` - Genre (masculin/féminin)

### Table `sejours`
- `id_sejour` (clé primaire)
- `id_voyageur` (clé étrangère)
- `debut` - Date de début du séjour
- `fin` - Date de fin du séjour

### Table `hebergements`
- `id` (clé primaire)
- `nom` - Nom de l'hébergement
- `capacite` - Nombre de personnes pouvant être hébergées
- `type` - Type d'hébergement (hôtel, appartement, etc.)
- `lieu` - Emplacement de l'hébergement
- `photo` - Image de l'hébergement
- `disponible` - Statut de disponibilité

## Utilisation

Accédez à l'application via l'URL racine et utilisez la barre de navigation pour accéder aux différentes sections:

- `/voyageurs` - Gestion des voyageurs
- `/sejours` - Gestion des séjours
- `/hebergements` - Gestion des hébergements

## Personnalisation

Vous pouvez personnaliser cette application selon vos besoins:

- Ajouter une authentification utilisateur
- Implémenter un système de réservation
- Ajouter des statistiques et des rapports
- Intégrer une API pour l'extension mobile

## Développeur

Développé par **Malthus AMETEPE**  
Contact: ametepemalthus16@gmail.com

## Licence

Ce projet est sous licence MIT.