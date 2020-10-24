<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use App\Concerns\UsesMultitenancyConfig;
use App\Scopes\UuidGenerate;
use App\Sluggable\HasSlug;
use App\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{
    use UuidGenerate, UsesMultitenancyConfig, HasSlug;

    protected $keyType = 'string';

    public $incrementing = false;


    public function isTenant(){

        if ( config( "database.connections.{$this->tenantDatabaseConnectionName()}.database" ) === config( "database.connections.{$this->landlordDatabaseConnectionName()}.database" )) {
            return false;
        }

        return true;
    }

    public function isUser(){

        return false;
    }


    public function getSlugOptions()
    {
        if (is_string($this->slugTo())) {
            if (in_array($this->slugTo(), $this->fillable)) {
                return SlugOptions::create()
                    ->allowDuplicateSlugs()
                    ->generateSlugsFrom($this->slugFrom())
                    ->saveSlugsTo($this->slugTo());
            }
        }
    }

    protected function getComponent(){

        return null;
    }

    protected  function slugTo()
    {
        return "slug";
    }

    protected  function slugFrom()
    {
        return 'name';
    }

    /**
     * Purge all of the team's resources.
     *
     * @return void
     */
    public function createBy($input)
    {
      return  $this->create($input);
    }

    /**
     * Purge all of the team's resources.
     *
     * @return void
     */
    public function updateBy($input)
    {
        return  $this->update($input);
    }

    /**
     * Purge all of the team's resources.
     *
     * @return void
     */
    public function purge()
    {
        $this->delete();
    }
}
