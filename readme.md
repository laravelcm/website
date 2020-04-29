## Laravel Cameroun

Laravel Cameroun est la plus grande communauté de developpeurs PHP & Laravel résidant au Cameroun.
Ce dépôt contien le code source du site de laravel Cameroun.


Site web : https://laravelcm.com

Facebook: https://www.facebook.com/laravelcm

Twitter: https://twitter.com/laravelcm

Groupe Slack: https://laravelcm.slack.com

Communauté sur Meetup: A venir

## Table of Contents

- [Features](#features)
- [Theme Demo](#theme-demo)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Run](#run)
- [How to contribute](#how-to-contribute)
- [Bugs and Feedback](#bugs-and-feedback)
- [License](#license)

## Fonctionnalités

- Administration Dashboard fait avec [TailwindUI](https://tailwindui.com)

## Sidebar Admin Demo
![Keen Bootstrap Admin Template](http://keenthemes.com/keen/themes/keen/doc/assets/img/demos/demo1-1.png "Keen Theme Browser Preview")


## Caracteristiques Serveur
Pour pouvoir lancer Laravel Cameroun, vous devez répondre aux exigences suivantes:
- PHP >= 7.4
- PHP Extensions: PDO, cURL, Mbstring, Tokenizer, Mcrypt, XML, GD
- Node.js > 6.0
- Composer > 1.0.0

## Installation
1. Installez Composer à l'aide d'instructions d'installation détaillées [ici](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
```
$ wget https://getcomposer.org/composer.phar
$ chmod +x composer.phar
$ mv composer.phar /usr/local/bin/composer
```
2. Installer Node.js à l'aide d'instructions d'installation détaillées [ici](https://nodejs.org/en/download/package-manager/)
```
$ yum install npm
```
3. Cloner le dépôt
```
$ git clone https://github.com/mckenziearts/laravelcm.git
```
4. Passer dans le répertoire de travail
```
$ cd laravelcm
```
5. Copier `.env.example` pour `.env` et modifiez selon votre environnement
```
$ cp .env.example .env
```
6. Installer les dependances de composer
```
$ composer install --prefer-dist
```
7. Génerer une clé d'application avec la commande
```
$ php artisan key:generate
```
8. Exécutez les commandes suivantes pour installer d'autres dépendances
```
$ npm install or yarn
$ npm run dev or yarn run dev
```
9. Exécutez ces commandes pour créer les tables dans la base de données définie et remplir les données de départ (seed)
```
$ php artisan migrate --seed
```

## Lancement

To start the PHP built-in server
```
$ php artisan serve --port=8080
or
$ php -S localhost:8080 -t public/
```

Vous pouvez visitez le site maintenant sur [http://localhost:8080](http://localhost:8080)  🙌

## Comment contribuer

Fork the repository, read the [CONTRIBUTE](CONTRIBUTE.md) file and make some changes.
Thanks!

### Contributeurs and Sponsors

Merci a tous les [contributeurs](https://github.com/mckenziearts/laravelcm/graphs/contributors) sur ce projet. Votre aide est très appréciée!

## Bugs and Feedback

Pour les bugs, questions et discussions, veuillez utiliser les [GitHub Issues](https://github.com/mckenziearts/laravelcm/issues).

## License

Ce site est un projet open source sous licence [MIT license](LICENSE).
