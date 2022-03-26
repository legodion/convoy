# Convoy

This package allows you to declare routes inside of your full page Laravel Livewire components.

All you have to do is create a `route` method inside of your Livewire components which returns a Laravel `Route`. The package will automatically detect the route. This package also works perfectly alongside traditional Laravel route files, and even allows you to cache them.

## Requirements

You must have [Laravel Livewire](https://laravel-livewire.com/docs/2.x/quickstart) installed before using this package.

## Installation

Require this package via Composer:

```console
composer require legodion/convoy
```

## Usage

Declare a `route` method inside of your Laravel Livewire components:

```php
namespace App\Http\Livewire\Auth;

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

    public function render()
    {
        return view('auth.login');
    }
}
```

## Commands

### Making Components

Create an inline Livewire component containing the `route` method:

```console
php artisan convoy:component {name}
```
