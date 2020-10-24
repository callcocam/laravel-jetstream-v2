<?php

namespace App\Console\Commands\Crud;

use Illuminate\Support\Facades\File;

class ComponentCommand  extends AbstractCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:component {name} {--connection=UsesTenantConnection}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command generate component crud';

    protected $type = "Component";

    public function handle()
    {
        //List component
        $this->stub = 'list';
        $this->generate();

        $this->stub = 'views/list';
        $this->generate();
        //Create component
        $this->stub = 'create';
        $this->generate();

        $this->stub = 'views/create';
        $this->generate();

        //Edit component
        $this->stub = 'edit';
        $this->generate();

        $this->stub = 'views/edit';
        $this->generate();

        //Delete component
        $this->stub = 'delete';
        $this->generate();
    }

    /**
     * @return mixed
     */
    protected function getStub()
    {
        return File::get(sprintf('%s/Livewire/%s.stub',__DIR__, $this->stub));
    }
}
