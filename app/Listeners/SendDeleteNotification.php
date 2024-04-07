<?php

namespace App\Listeners;

use App\Mail\MyTestEmail;
use App\Events\TodoDeleted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDeleteNotification
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
     * @param  \App\Events\TodoDeleted  $event
     * @return void
     */
    public function handle(TodoDeleted $event)
    {
        $delete = $event -> id;
        Mail::to('stark8945@gmail.com')->send(new MyTestEmail($delete));
    }
}
