<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Tasks;


use App\Models\Concerns\UsesTenantModel;

class LoadTenantsTask
{

    use UsesTenantModel;

    public static function make(){

        $tenant = new static();

        return $tenant->execute();
    }

    protected function execute()
    {
        $tenantQuery = $this->getTenantModel()::query()->get();

        return $tenantQuery;
    }
}
