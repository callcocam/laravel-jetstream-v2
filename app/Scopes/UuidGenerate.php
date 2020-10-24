<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Scopes;

use Ramsey\Uuid\Uuid;

trait UuidGenerate
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function($model){

            $model->id = Uuid::uuid4();

            if($model->isTenant()){
                $model->tenant_id = app('currentTenant')->id;
            }
            if(auth()->check()){
                if ($model->isUser()){
                    $model->user_id = auth()->id();
                }
            }
        });
//        static::created(function ($model){
//           if($model->isRelated()){
//               $model->one()->create([
//                   'id'=> Uuid::uuid4(),
//                   'tenant_id'=>app(GlobalSettings::class)->id()
//               ]);
//           }
//        });
    }
}
