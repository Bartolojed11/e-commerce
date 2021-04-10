<?php

namespace App\Listeners\Admin;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\Admin\SendAdminCrendentials;
use Illuminate\Support\Facades\Mail;
use App\Mail\Admin\SendAdminCredentials;
use App\Events\Admin\NewAdmin;
use Illuminate\Support\Facades\Log;

class NewAdminListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewAdmin $event)
    {
       $admin = $event->data;
       Mail::to($admin->email)->send(new SendAdminCredentials($admin));
    }
}
