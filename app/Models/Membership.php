<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use App\Models\Concerns\UsesTenantConnection;
use App\Scopes\UuidGenerate;
use Laravel\Jetstream\Membership as JetstreamMembership;

class Membership extends JetstreamMembership
{
    use UsesTenantConnection, UuidGenerate;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public function isTenant(){
        return false;
    }

    public function isUser(){
        return false;
    }
}
