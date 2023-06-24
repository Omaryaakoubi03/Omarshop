<?php

namespace App\Listeners;

use App\Events\emailorder;
use App\Mail\OrderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class sendorderemail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(emailorder $event): void

    {

        Mail::to( Auth::user()->email)->send(new OrderMail());

    }
}
