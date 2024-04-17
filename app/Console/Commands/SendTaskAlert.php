<?php

namespace App\Console\Commands;

use App\Models\Todo;
use App\Models\TodoClone;
use Illuminate\Console\Command;

class SendTaskAlert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alert:send_task_alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email alert to user after a new task is created';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lastCloneId = TodoClone::max('id');
        $newTodos = Todo::where('id', '>', $lastCloneId)->get();
        foreach ($newTodos as $Todo){
            
                $todoClone = new TodoClone();
                $todoClone->id = $Todo->id;
                $todoClone->description = $Todo->description;
                $todoClone->status = $Todo->status;
                $todoClone->save();            
        }
    }
}
