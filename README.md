 bash
 ```
 composer install
 copy .env.example .env 
 ```
 create a database  withname photo
 ( then change database name there i.e. "chat_box" in my case)
 ```
  php artisan migrate 
 php artisan key:generate
 ```
```
npm install 
npm run watch 
```
for photo content public/storage  to storage/app/public/
``` 
//first delete the storage  folder from public( if it already there)

php artisan storage:link
```
```
php artisan serve
```



composer require laravel/ui:^2.4

n AuthServiceProvider.php you should not check if the key exists or not in storage.

And in .gitinnore file comment /storage/*.key line like this # /storage/*.key

Then after deploying to heroku generate passpot key.

php artisan passport:keys
