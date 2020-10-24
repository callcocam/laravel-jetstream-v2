<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Http\Middleware;

use Closure;
use App\Exceptions\NoCurrentTenant;
use App\Models\Concerns\UsesTenantModel;

class NeedsTenant
{
    use UsesTenantModel;

    public function handle($request, Closure $next)
    {
        if (! $this->getTenantModel()::checkCurrent()) {
            return $this->handleInvalidRequest();
        }

        return $next($request);
    }

    public function handleInvalidRequest(): void
    {
        throw NoCurrentTenant::make();
    }
}
