<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use App\Models\Concerns\UsesLandlordConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends AbstractModel
{
    use HasFactory, UsesLandlordConnection;

    protected $fillable = ['id','name','slug','route','url','icone','status','description'];

    public function menu_type(){

        return $this->belongsToMany(MenuType::class);
    }
}
