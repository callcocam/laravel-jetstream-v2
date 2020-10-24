<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use App\Concerns\HasPermissions;
use App\Models\Concerns\UsesLandlordConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Contracts\Role as RoleContract;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends AbstractModel implements RoleContract
{
    use HasFactory, UsesLandlordConnection, HasPermissions;

    /**
     * The attributes that are fillable via mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'special', 'status'];

    /**
     * Roles can belong to many users.
     *
     * @return mixed
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * Determine if role has permission flags.
     *
     * @return bool
     */
    public function hasPermissionFlags(): bool
    {
        return ! is_null($this->special);
    }

    /**
     * Determine if the requested permission is permitted or denied
     * through a special role flag.
     *
     * @return bool
     */
    public function hasPermissionThroughFlag(): bool
    {
        if ($this->hasPermissionFlags()) {
            return ! ($this->special === 'no-access');
        }

        return true;
    }
}
