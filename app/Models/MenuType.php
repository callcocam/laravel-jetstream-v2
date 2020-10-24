<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use App\Models\Concerns\UsesLandlordConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuType extends AbstractModel
{
    use HasFactory, UsesLandlordConnection;

    protected $fillable = ['id','name','slug','status'];

    public function menus(){

        return $this->belongsToMany(Menu::class);

    }
}
