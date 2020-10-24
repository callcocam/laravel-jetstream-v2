<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models\Concerns;

use App\Concerns\UsesMultitenancyConfig;

trait UsesTenantConnection
{
    use UsesMultitenancyConfig;

    public function getConnectionName()
    {
        return $this->tenantDatabaseConnectionName();
    }
}
