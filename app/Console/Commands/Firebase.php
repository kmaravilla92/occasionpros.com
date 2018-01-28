<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Kreait\Firebase\Factory as FirebaseFactory;

class Firebase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'op:firebase {action?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Firebase CLI';

    protected $firebase;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        FirebaseFactory $firebase
    )
    {
        $this->firebase = $firebase->create();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $action = $this->argument('action');
        $database = $this->firebase->getDatabase();
        switch($action){
            case 'clear_db':
                $database->getReference('/')->remove();
                $this->info('Firebase database cleared ...');
            break;
            default:
            break;
        }
    }
}
