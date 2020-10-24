<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Concerns;

trait RefreshesPermissionCache
{
    public static function bootRefreshesPermissionCache()
    {
        static::saved(function() {
            cache()->tags(config('acl.cache.tag'))->flush();
        });

        static::deleted(function() {
            cache()->tags(config('acl.cache.tag'))->flush();
        });
    }
}
