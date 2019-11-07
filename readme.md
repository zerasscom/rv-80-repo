
# Installation on Local
```
git clone https://github.com/zerasscom/rv-80-repo.git rv-80-repo.loc
git clone git@github.com:zerasscom/rv-80-repo.git rv-80-repo.loc

cd rv-80-repo.loc

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
php composer.phar install

copy .env.example .env 
php artisan key:generate 
```
##### Create a database (charset: utf8)
##### Change options in .env (database settings, app_url)
```
php artisan migrate --seed
php artisan vendor:publish --force -q --no-interaction
```
##### Put this line to cron. Run Every minutes for!
```
 * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

# Installation on Remote server
```
git clone https://github.com/zerasscom/rv-80-repo.git rv-80-repo.loc
git clone git@github.com:zerasscom/rv-80-repo.git public_html 
cd public_html

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
php composer.phar install

copy .env.example .env 
php artisan key:generate
``` 
##### Create a database (charset: utf8)
##### Change options in .env (database settings, app_url)
```
php artisan migrate --seed
php artisan vendor:publish --force -q --no-interaction
```
##### Put this line to cron. Run Every minutes for!
```
 * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
