Service Provider para carregar modulo

Comando para gerar migrations
``` bash
php artisan make:migration create_pages --path=modules/Pages/Migrations
```

Exportar arquivos de um modulo
``` bash
php artisan vendor:publish --provider="Modules\Pages\Providers\PageServiceProvider" --tag=views
```

https://github.com/robsantossilva/son-laravel-location
https://github.com/robsantossilva/son-laravel-pages

https://packagist.org/packages/robsantossilva/son-laravel-location
https://packagist.org/packages/robsantossilva/son-laravel-pages
