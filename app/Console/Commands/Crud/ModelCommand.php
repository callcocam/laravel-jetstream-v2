<?php

namespace App\Console\Commands\Crud;

use Illuminate\Support\Facades\File;

class ModelCommand extends AbstractCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:model {name} {--connection=UsesTenantConnection}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command generate model crud';

    public function handle()
    {
        $this->stub = 'model';

        parent::handle();
    }

    /**
     * @return mixed
     */
    protected function getStub()
    {
        return File::get(sprintf('%s/stubs/%s.stub',__DIR__, $this->stub));
    }
}
