<?php

namespace App\Http\Middleware;

use App\Models\Landlord;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandlordConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       // config('auth.providers.users.model', Landlord::class);


        return $next($request);
    }
}
