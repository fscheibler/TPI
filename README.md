TPI - Florent Scheiblers
=================

Description
-----------

Ce projet vise à développer une application web, utilisant le framework Laravel, pour le monitoring proactif des sites
et projets de nos clients. L'application doit permettre une vue d'ensemble ergonomique des informations issues de
diverses sources, initialement de Oh Dear et Flare.

Stack
---------

* PHP 8.2

* MySQL 8.2.13

* Stack TALL (TailwindCSS, Alpine.js, Laravel, Livewire)

* Gestion des APIs (Oh Dear et Flare)

Installation
------------

1. Cloner le dépôt Git

2. Configurer l'environnement **.env** à partir de **.env.example**

3. Installer les dépendances via Composer et npm

4. Configurer une base de données et exécuter les migrations

5. 

Fonctionnalités
---------------

* Monitoring de l'uptime, performances, DNS, certificats SSL, et plus via Oh Dear

* Tracking des erreurs avec contexte via Flare

* Ajout futur d'intégrations (CRM d’Infomaniak, ClickUp)

* Mise à jour des données toutes les 5 minutes avec possibilité de rafraîchissement manuel

Configuration
-------------

Les projets à monitorer sont ajoutés via un fichier de configuration **config/projects.php**, avec possibilité
d'activer/désactiver des sources de données spécifiques.

Documentation
-------------

Accessible sous [monitoring.firstpoint.ch](/), nécessite
une authentification. Tous les collaborateurs ont leur propre accès, mais les permissions sont uniformes.

Bonnes Pratiques
----------------

* Utilisation de PHP 8.x, code fortement typé, respect des principes DRY

* Documentation des méthodes, bon nommage des variables, classes, et méthodes

Livrables
---------

* Planification initiale, rapport de projet, journal de travail, et repository Git
* Documents dans le dossier _Documents_TPI

Évaluation
----------

Les points techniques évalués incluent la connaissance de PHP, Laravel, le développement responsive, l'UX/UI, la
consommation d'APIs externes, la rédaction de documentation pour développeurs, et l'évolutivité du projet.
