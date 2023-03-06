<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
Kebutuhan Perangkat Lunak
------------
> **Penting: Pastikan server sudah memenuhi kriteria berikut ini.**
- Webserver Nginx, here the doc: https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04
- Database Postgres, link of doc: https://www.digitalocean.com/community/tutorials/how-to-install-and-use-postgresql-on-ubuntu-18-04
- Composer, link of doc: https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-18-04
- Git, link of doc: https://www.digitalocean.com/community/tutorials/how-to-install-git-on-ubuntu-18-04
- Gmail account for mailer service, doc: https://hotter.io/docs/email-accounts/secure-app-gmail/

Persiapan
------------
Buat database untuk aplikasi ini, gunakan nama database default
```
sudo -u postgres createdb microdata_store
```

Instalasi
------------
Clone repository, sebaiknya menggunakan ssh. Untuk penjelasan mengenai koneksi git menggunakan ssh, silahkan baca link dibawah ini
```
https://help.github.com/en/github/authenticating-to-github/connecting-to-github-with-ssh
```
Setelah ssh selesai di setting, minta kepada pemilik repo ini untuk mendaftarka ssh server anda, agar bisa melakukan clone.
Selanjutnya, masuk ke nginx web directory dengan mengetik perintah berikut:
```
cd /var/www/html
```

Lalu clone repo ini menggunakan ssh
```
git clone git@github.com:cooljar/microdataStore.git
```
Jika muncul pesan kesalahan, kemungkinan ssh server anda belum didaftarkan oleh pemilik repo ini.

Inisialisasi Project
---
Move to root project directory by type following command
```
cd microdataStore
```
Update project dependencies using composer
```
composer update
```

Setting permission untuk direktori yang diperlukan.
```
chmod -R 777 api/runtime
```

Chose prefer environment by run following command
```
php init
```
will return output:
```
[0] Development
[1] Production
   
Your choice [0-1, or "q" to quit]
```
select env option by typing the number and press enter

Setup database  and mailer connection, update file common/config/main-local.php then write database connection and mailer setting.
```
nano common/config/main-local.php
```
lalu ubah isinya
```
<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=localhost;dbname=microdata_store',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
        ],
        'urlManagerFrontend'=>[
            'class' => 'yii\web\UrlManager',
            'hostInfo' => 'http://localhost',
            'baseUrl' => 'http://localhost/microdata/store/frontend/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'urlManagerApi'=>[
            'class' => 'yii\web\UrlManager',
            'hostInfo' => 'http://localhost',
            'baseUrl' => 'http://localhost/microdata/store/api/web',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
    ],
];
```
Sesuaikan isinya dengan data server anda.

Run initial migration by typing following command
```
php yii migrate/to m190124_110200_add_verification_token_column_to_user_table
```

Run RBAC migration by typing following command
```
php yii migrate --migrationPath=@yii/rbac/migrations
```

Run all migration by typing following command
```
php yii migrate
```

Install sample data, by typing following command
```
php yii migrate --migrationPath=@backend/migrations
```
It will generate sample data member, currency, deposit, balance, market_pair, order_book, and trade data

Akun admin backend:
```
Username: administrator
Password: 123456
```

Server Info:
```
128.199.129.191
```