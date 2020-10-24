<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Commands\Concerns;

use Illuminate\Support\Arr;
use App\Concerns\UsesMultitenancyConfig;
use App\Models\Concerns\UsesTenantModel;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

trait TenantAware
{
    protected $currentTenants = [];
    use UsesMultitenancyConfig, UsesTenantModel;

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tenants = Arr::wrap($this->option('tenant'));

        $tenantQuery = $this->getTenantModel()::query()
            ->when(! blank($tenants), function ($query) use ($tenants) {
                collect($this->getTenantArtisanSearchFields())->unique('database')
                    ->each(fn ($field) => $query->orWhereIn($field, Arr::wrap($tenants)));
            });
        if ($tenantQuery->count() === 0) {
            $this->error('No tenant(s) found.');

            return -1;
        }

        return $tenantQuery
            ->cursor()
            ->map(function ($tenant) {
                if(!in_array($tenant->database, $this->currentTenants)){
                    $tenant->execute(fn () => (int) $this->laravel->call([$this, 'handle']));
                }
                $this->currentTenants[$tenant->database] = $tenant->database;
            })
            ->sum();
    }
}
