<?php
/**
 * Created by PhpStorm.
 * User: gus
 * Date: 22/05/17
 * Time: 20:17
 */

namespace Gustavo82mdq\Eav;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'Gustavo82mdq\Eav\app\Http\Controllers';

    public function map() {
        $this->mapAdminroutes();
    }

    protected function mapAdminRoutes() {
        Route::middleware(['web', 'admin'])
            ->prefix('admin') // or use the prefix from CRUD config
            ->namespace($this->namespace.'\Admin')
            ->group(realpath(__DIR__.'/routes/admin.php'));
    }
}