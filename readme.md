# Convoy

This package allows you to declare routes inside of your Laravel Livewire components.

All you have to do is create a `route` method inside of your Livewire components which returns a Laravel `Route`. The package will automatically detect the route. This package also works perfectly alongside traditional Laravel route files, and even allows you to cache them.

## Installation

Require this package via Composer:

```console
composer require legodion/convoy
```

## Usage

Declare a `route` method inside of your Laravel Livewire components:

```php
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Login extends Component
{
    public function route()
    {
        return Route::get('/login')
            ->name('login')
            ->middleware('guest');
    }
}
```

## Commands

### Making Components

Create an inline Livewire component containing the `route` method:

```console
php artisan convoy:component {name}
```
