<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use App\Models\Concerns\UsesLandlordConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Contracts\Permission as PermissionContract;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends AbstractModel implements PermissionContract
{
    use HasFactory, UsesLandlordConnection;

    /**
     * The attributes that are fillable via mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'groups', 'description', 'status','created_at','updated_at'];

    /**
     * Permissions can belong to many roles.
     *
     * @return mixed
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function slugTo()
    {
        return false;
    }
}
