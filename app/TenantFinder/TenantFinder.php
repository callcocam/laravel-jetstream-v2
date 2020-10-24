<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\TenantFinder;

use Illuminate\Http\Request;
use App\Models\Tenant;

abstract class TenantFinder
{
    abstract public function findForRequest(Request $request): ?Tenant;
}
