<?php

namespace App\Listeners;

use App\Events\TreatEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TreatEventListener
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
     * @param  TreatEvent  $event
     * @return void
     */
    public function handle(TreatEvent $event)
    {
        //
    }
}
