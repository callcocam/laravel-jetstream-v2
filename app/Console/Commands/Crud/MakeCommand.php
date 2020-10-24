<?php

namespace App\Console\Commands\Crud;

use Illuminate\Console\Command;

class MakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:make {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cria uma estrutura de crud';

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
     * @return int
     */
    public function handle()
    {
        //Controller
        $stub  = $this->stub("controller");

        //View index e edit

        //livewire Component

    }

    protected function stub($stub){


    }
}
