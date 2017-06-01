<?php

namespace Gustavo82mdq\Eav\app\Listeners;

use Gustavo82mdq\Eav\app\Events\LoadTypesEvent;
use Illuminate\Support\Facades\Storage;

class LoadTypesEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  =LoadTypesEvent  $event
     * @return void
     */
    public function handle(LoadTypesEvent $event)
    {
        $files = Storage::disk('root')->files(config('gustavo82mdq.eav.types_location'));
        $event->types = array_merge($event->types, $files);
    }
}
