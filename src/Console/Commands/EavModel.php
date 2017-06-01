<?php

namespace Gustavo82mdq\Eav\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class EavModel extends GeneratorCommand
{
    protected $name = 'eav:eav-model';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eav:eav-model {name}';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a EAV model';

    protected function getStub()
    {
        return __DIR__.'/../stubs/eav-model.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.config('gustavo82mdq.eav.default_namespace');
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [

        ];
    }
}
