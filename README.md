### Medium Clone
https://www.freecodecamp.org/news/learn-laravel-by-building-a-medium-clone/

# installs
> composer require laravel/breeze

> php artisan breeze:install

> Choose: Blade with Alpine

> https://spatie.be/docs/laravel-medialibrary/v11/introduction 

> composer require "spatie/laravel-medialibrary"

> php artisan vendor:publish --provider="Spatie\MediaLibrary\MediaLibraryServiceProvider" --tag="medialibrary-migrations"

> composer require spatie/laravel-sluggable

# Image queue
> php artisan queue:listen (on dev)
> php artisan queue:work (on production?)
> php artisan media-library:regenerate

# other
> php artisan migrate:fresh --seed

> php artisan migrate:rollback --step=1

> php artisan storage:link

> php artisan optimize:clear

> php artisan optimize

> php artisan make:controller PostController --resource --model=Post


Current time:
https://youtu.be/MG1kt_wiIz0?si=arludqWnAmcQKMR3&t=19769
