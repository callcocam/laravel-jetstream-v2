<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Actions;

use App\Contracts\CreatesItems;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CreateItem implements CreatesItems
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $model
     * @param  array  $input
     * @return void
     */
    public function create($model, array $input)
    {
      return  $model->createBy($input);
    }
}
