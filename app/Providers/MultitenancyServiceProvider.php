<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Actions\MakeQueueTenantAwareAction;
use App\Commands\TenantsArtisanCommand;
use App\Concerns\UsesMultitenancyConfig;
use App\Models\Concerns\UsesTenantModel;
use App\Tasks\TasksCollection;
use App\TenantFinder\TenantFinder;

class MultitenancyServiceProvider extends ServiceProvider
{
    use UsesTenantModel,
        UsesMultitenancyConfig;

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this
                ->registerPublishables();
        }

        $this
            ->bootCommands()
            ->registerTenantFinder()
            ->registerTasksCollection()
            ->configureRequests()
            ->configureQueue();
    }

    public function register()
    {

    }

    protected function registerPublishables(): self
    {
        return $this;
    }

    protected function determineCurrentTenant(): void
    {
        if (! config('multitenancy.tenant_finder')) {
            return;
        }

        /** @var \App\TenantFinder\TenantFinder $tenantFinder */
        $tenantFinder = app(TenantFinder::class);

        $tenant = $tenantFinder->findForRequest(request());

        optional($tenant)->makeCurrent();
    }

    protected function bootCommands(): self
    {
        $this->commands([
            TenantsArtisanCommand::class,
        ]);

        return $this;
    }

    protected function registerTasksCollection(): self
    {
        $this->app->singleton(TasksCollection::class, function () {
            $taskClassNames = config('multitenancy.switch_tenant_tasks');

            return new TasksCollection($taskClassNames);
        });

        return $this;
    }

    protected function registerTenantFinder(): self
    {
        if (config('multitenancy.tenant_finder')) {
            $this->app->bind(TenantFinder::class, config('multitenancy.tenant_finder'));
        }

        return $this;
    }

    protected function configureRequests(): self
    {
        if (! $this->app->runningInConsole()) {
            $this->determineCurrentTenant();
        }

        return $this;
    }

    protected function configureQueue(): self
    {
        $this
            ->getMultitenancyActionClass(
                'make_queue_tenant_aware_action',
                MakeQueueTenantAwareAction::class
            )
            ->execute();

        return $this;
    }
}
