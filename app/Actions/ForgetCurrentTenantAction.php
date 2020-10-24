<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Actions;

use App\Events\ForgettingCurrentTenantEvent;
use App\Events\ForgotCurrentTenantEvent;
use App\Models\Tenant;
use App\Tasks\SwitchTenantTask;
use App\Tasks\TasksCollection;

class ForgetCurrentTenantAction
{
    private TasksCollection $tasksCollection;

    public function __construct(TasksCollection $tasksCollection)
    {
        $this->tasksCollection = $tasksCollection;
    }

    public function execute(Tenant $tenant)
    {
        event(new ForgettingCurrentTenantEvent($tenant));

        $this
            ->performTaskToForgetCurrentTenant()
            ->clearBoundCurrentTenant();

        event(new ForgotCurrentTenantEvent($tenant));
    }

    protected function performTaskToForgetCurrentTenant(): self
    {
        $this->tasksCollection->each(fn (SwitchTenantTask $task) => $task->forgetCurrent());

        return $this;
    }

    private function clearBoundCurrentTenant()
    {
        $containerKey = config('multitenancy.current_tenant_container_key');

        app()->forgetInstance($containerKey);
    }
}
