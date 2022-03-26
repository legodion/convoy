<?php

namespace Legodion\Convoy\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Livewire\Commands\ComponentParser;
use Symfony\Component\Console\Input\InputOption;

class ComponentCommand extends GeneratorCommand
{
    protected $name = 'convoy:component';
    protected $type = 'Component';

    public function handle()
    {
        if (parent::handle() === false && !$this->option('force')) {
            return false;
        }

        return 0;
    }

    protected function getStub()
    {
        return __DIR__ . '/../../stubs/Component.php';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return config('livewire.class_namespace');
    }

    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE],
        ];
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceRoute($stub)
            ->replaceNamespace($stub, $name)
            ->replaceClass($stub, $name);
    }

    protected function replaceRoute(&$stub)
    {
        $componentParser = new ComponentParser(
            config('livewire.class_namespace'), 
            config('livewire.view_path'), 
            $this->argument('name')
        );

        $routeName = Str::replaceFirst('livewire.', '', $componentParser->viewName());

        $replace = [
            'DummyRouteUri' => '/' . str_replace('.', '/', $routeName),
            'DummyRouteName' => $routeName,
            'DummyWisdomOfTheTao' => $componentParser->wisdomOfTheTao(),
        ];

        $stub = str_replace(array_keys($replace), $replace, $stub);

        return $this;
    }
}
