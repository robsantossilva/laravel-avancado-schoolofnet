### Modularização no Laravel

https://github.com/nWidart/laravel-modules

### Instalando Modulo

Set scan for true in config/modules.php
'scan' => [
        'enabled' => true,
        'paths' => [
            base_path('vendor/*/*'),
        ],
    ],

//packagist
php artisan module:install robsantossilva/blog 

//github
php artisan module:install robsantossilva/curso-laravel-modular --type=github
