<?php

namespace Gustavo82mdq\Eav\Console\Commands;

use Illuminate\Console\Command;

class Publish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eav:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publisher for EAV';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $publishes = [
            ["--provider" => "Backpack\Base\BaseServiceProvider"],
            ["--provider" => "Prologue\Alerts\AlertsServiceProvider"],
            ["--provider" => "Backpack\CRUD\CrudServiceProvider", "--tag" => "public"],
            ["--provider" => "Backpack\CRUD\CrudServiceProvider", "--tag" => "lang"],
            ["--provider" => "Backpack\CRUD\CrudServiceProvider", "--tag" => "config"],
            ["--provider" => "Backpack\CRUD\CrudServiceProvider", "--tag" => "elfinder"],
            ["--provider" => "Rinvex\Attributable\Providers\AttributableServiceProvider", "--tag" => "migrations"],
            ["--provider" => "Rinvex\Attributable\Providers\AttributableServiceProvider", "--tag" => "config"],
        ];

        \Artisan::call("elfinder:publish");

        foreach ($publishes as $publish){
            \Artisan::call("vendor:publish", $publish);
            echo \Artisan::output();
        }
    }
}
