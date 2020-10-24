<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

#Add 
```
// in `app\Http\Kernel.php`

protected $middlewareGroups = [
    'web' => [
        // ...
        \App\Http\Middleware\NeedsTenant::class,
        \App\Http\Middleware\EnsureValidTenantSession::class
    ]
];
```
#Voce pode criar um grupo

```
// in `app\Http\Kernel.php`

protected $middlewareGroups = [
    // ...
    'tenant' => [
        \Spatie\Multitenancy\Http\Middleware\NeedsTenant::class,
        \Spatie\Multitenancy\Http\Middleware\EnsureValidTenantSession::class
    ]
];

```
#Exemplo de uso

```
// in a routes file

Route::middleware('tenant')->group(function() {
    // routes
});

```
#pegar o current tenant 

```
app('currentTenant')
```


#MIGRATING LANDLORD DATABASES
```
php artisan migrate --path=database/migrations/landlord --database=landlord
```

#MIGRATING TENANT DATABASES
```
php artisan tenants:artisan "migrate --database=tenant"
```
#SEEDING TENANT DATABASES

```
php artisan tenants:artisan "migrate --database=tenant --seed"
```
