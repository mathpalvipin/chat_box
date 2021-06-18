composer require laravel/ui:^2.4

n AuthServiceProvider.php you should not check if the key exists or not in storage.

And in .gitinnore file comment /storage/*.key line like this # /storage/*.key

Then after deploying to heroku generate passpot key.

php artisan passport:keys
