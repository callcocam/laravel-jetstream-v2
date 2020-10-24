<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Actions;

use App\Events\MadeTenantCurrentEvent;
use App\Events\MakingTenantCurrentEvent;
use App\Models\Tenant;
use App\Tasks\SwitchTenantTask;
use App\Tasks\TasksCollection;

class MakeTenantCurrentAction
{
    protected TasksCollection $tasksCollection;

    public function __construct(TasksCollection $tasksCollection)
    {
        $this->tasksCollection = $tasksCollection;
    }

    public function execute(Tenant $tenant)
    {
        event(new MakingTenantCurrentEvent($tenant));

        $this
            ->performTasksToMakeTenantCurrent($tenant)
            ->bindAsCurrentTenant($tenant);

        event(new MadeTenantCurrentEvent($tenant));

        return $this;
    }

    protected function performTasksToMakeTenantCurrent(Tenant $tenant): self
    {
        $this->tasksCollection->each(fn (SwitchTenantTask $task) => $task->makeCurrent($tenant));

        return $this;
    }

    protected function bindAsCurrentTenant(Tenant $tenant): self
    {
        $containerKey = config('multitenancy.current_tenant_container_key');

        app()->forgetInstance($containerKey);

        app()->instance($containerKey, $tenant);

        return $this;
    }
}
