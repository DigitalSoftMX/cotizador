<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use DateTime;

class SuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        DB::table('login_acts')->insert(
            ['nombre' => $event->user->name, 'email'=>$event->user->email,'inicio'=> date("Y-m-d H:i:s")]
        );
        //dd($event->user->name);
        //$event->user->last_login = new DateTime;
        //$event->user->save();
    }
}
