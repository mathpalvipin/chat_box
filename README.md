## link 
http://still-chamber-85568.herokuapp.com/



 bash
 ```
 composer install
 copy .env.example .env 
 ```
 create a database  withname "chat_box
 ( then change database name there i.e. "chat_box" in my case)
 ```
  php artisan migrate 
 php artisan key:generate
 ```
```
npm install 
npm run watch 
```

```
php artisan serve
```

for deployement only 
to make all call to https instead of http (except when on  'LOCAl')
add this to boot() in app/providers/appserviceprovider.php
```
If (env('APP_ENV') !== 'local') {
            $this->app['request']->server->set('HTTPS', true);
        }
        ```
