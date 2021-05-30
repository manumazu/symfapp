Symfony Demo Application with Elasticsearch
========================

The "Symfony Demo Application" is a reference application created to show how
to develop applications following the [Symfony Best Practices][1].

Requirements
------------

  * PHP 7.2.9 or higher;
  * PDO-SQLite PHP extension enabled;
  * elasticsearch 7.13.0
  * ruflin/elastica
  * and the [usual Symfony application requirements][2].

Installation
------------

```bash
$ composer create-project symfony/symfony-demo symfapp
$ composer require ruflin/elastica
```

Usage
-----

There's no need to configure anything to run the application. If you have
[installed Symfony][4] binary, run this command:

```bash
$ cd symfapp/
$ docker-compose up -d
$ $ ./bin/console elastic:reindex
$ php -S localhost:8000 -t public/
```
Load ES server and Kibana with docker
Launch indexation using console
Then access the application in your browser at the given URL (<http://localhost:8000> by default).

Tests
-----

Execute this command to run tests:

```bash
$ cd symfapp/
$ ./bin/phpunit
```

[1]: https://symfony.com/doc/current/best_practices.html
[2]: https://symfony.com/doc/current/reference/requirements.html
[3]: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html
[4]: https://symfony.com/download
