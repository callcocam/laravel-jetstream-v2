<?php

namespace App\Console\Commands\Crud;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ControllerCommand extends AbstractCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:controller {name} {--connection=UsesTenantConnection}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command generate controller crud';

    protected $type = "Controller";

    protected $namespace = "App\Http\Controller";


    public function handle()
    {
        //Controller
        $this->stub = 'controller';
        $this->directory = app_path(sprintf("Http/Controllers%s", $this->add_namespace()));
        $this->path = app_path(sprintf("Http/Controllers/%s.php", $this->namespaceAndName()));
        $this->generate();

        //Index view
        $this->stub = 'views/index';
        $this->directory = resource_path(sprintf("views/%s", Str::slug($this->model())));
        $this->path = resource_path(sprintf("views/%s/index.blade.php", Str::slug($this->model())));
        $this->generate();

        //Edit view
        $this->path = resource_path(sprintf("views/%s/edit.blade.php", Str::slug($this->model())));
        $this->stub = 'views/edit';
        $this->generate();
    }

    /**
     * @return mixed
     */
    protected function getStub()
    {
        return File::get(sprintf('%s/stubs/%s.stub',__DIR__, $this->stub));
    }
}
