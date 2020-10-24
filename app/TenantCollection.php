<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Tenant;

class TenantCollection extends Collection
{
    public function eachCurrent(callable $callable): self
    {
        return $this->performCollectionMethodWhileMakingTenantsCurrent('each', $callable);
    }

    public function mapCurrent(callable $callable): self
    {
        return $this->performCollectionMethodWhileMakingTenantsCurrent('map', $callable);
    }

    protected function performCollectionMethodWhileMakingTenantsCurrent(string $operation, callable $callable): self
    {
        $collection = $this->$operation(fn (Tenant $tenant) => $tenant->execute($callable));

        return new static($collection->items);
    }
}
