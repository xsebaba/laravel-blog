<h2 align="center">Laravel Blog</h2></p>

<p>Hi, this is a smple CMS system provided as a blog. </p>

#Instalation
```
git clone <repository url>
composer install
cp .env.example .env
```
#Then create the necessary database.

```
php artisan db
create database blog
```

#And run the migrations and seedings

```
php artisan migrate --seed
```
