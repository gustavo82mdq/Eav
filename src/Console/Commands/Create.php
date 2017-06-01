<?php

namespace Gustavo82mdq\Eav\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eav:create {name} {namespace}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create EAV model & controller';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = ucfirst($this->argument('name'));
        $namespace = ucfirst($this->argument('namespace'));

        Artisan::call('eav:eav-model', ['name' => $name]);
        echo Artisan::output();

        // Create the CRUD Controller and show output
        Artisan::call('eav:crud-controller', ['name' => $name, 'model_namespace' => $namespace]);
        echo Artisan::output();

        // Create the CRUD Request and show output
        Artisan::call('backpack:crud-request', ['name' => $name]);
        echo Artisan::output();

    }
}
