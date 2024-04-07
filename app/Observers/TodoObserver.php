<?php

namespace App\Observers;

use App\Models\Todo;
use Illuminate\Support\Facades\Log;
use App\Models\DescObserv;

class TodoObserver
{
    /**
     * Handle the Todo "created" event.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    public function created(Todo $todo)
    {
        //
    }

    /**
     * Handle the Todo "updated" event.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    public function updated(Todo $todo)
    {
        $old_value = $todo->getOriginal();
        $new_value = $todo->getChanges();
 
    $old = $old_value['description'];
    $new = $new_value['description'];

    $descobserv= new descobserv();
    $descobserv->old_description = $old;
    $descobserv->new_description = $new;
    $descobserv->save();
    }

    /**
     * Handle the Todo "deleted" event.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    public function deleted(Todo $todo)
    {
        //
    }

    /**
     * Handle the Todo "restored" event.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    public function restored(Todo $todo)
    {
        //
    }

    /**
     * Handle the Todo "force deleted" event.
     *
     * @param  \App\Models\Todo  $todo
     * @return void
     */
    public function forceDeleted(Todo $todo)
    {
        //
    }
}
