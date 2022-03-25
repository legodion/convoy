<?php

namespace DummyNamespace;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class DummyClass extends Component
{
    public function route()
    {
        return Route::get('DummyRouteUri')
            ->name('DummyRouteName');
    }

    public function render()
    {
        return <<<'BLADE'
            <div>
                {{-- DummyWisdomOfTheTao --}}
            </div>
        BLADE;
    }
}
