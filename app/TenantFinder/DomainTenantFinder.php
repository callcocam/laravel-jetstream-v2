<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\TenantFinder;

use Illuminate\Http\Request;
use App\Models\Concerns\UsesTenantModel;
use App\Models\Tenant;

class DomainTenantFinder extends TenantFinder
{
    use UsesTenantModel;

    public function findForRequest(Request $request):?Tenant
    {
        $host = $request->getHost();

        return $this->getTenantModel()::whereDomain($host)->first();
    }
}
