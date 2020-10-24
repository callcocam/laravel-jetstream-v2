<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Tasks;

use App\Models\Tenant;

interface SwitchTenantTask
{
    public function makeCurrent(Tenant $tenant): void;

    public function forgetCurrent(): void;
}
