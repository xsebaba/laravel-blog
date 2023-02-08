<h2 align="center">Laravel Blog</h2></p>

<p>Hi, this is a smple CMS system provided as a blog. </p>

<b>Instalation.</b>
```
git clone <repository url>
composer install
cp .env.example .env
```
<b>Then create the necessary database.</b>

```
php artisan db
create database blog
```

<b>And run the migrations and seedings.</b>

```
php artisan migrate --seed
```
