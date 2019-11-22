<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class AddComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comments:add {id} {comment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Append comment for a specified user';

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
        
        $id = $this->argument('id');
        $comment = $this->argument('comment');

        if (!is_numeric($id)){
            $this->error('invalid id');
        } else {
            $user = User::find($id);

            if (!isset($user)) {
                $this->error('No such user (1)');
            } else {
                $user->comments .= "\n".$comment; 

                if ($user->save()) {
                    $this->info('OK');
                } else {
                    $this->error('Could not update database');
                }
            }
        }
    }
}
