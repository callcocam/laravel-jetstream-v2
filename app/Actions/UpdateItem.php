<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Actions;

use App\Contracts\UpdatesItems;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateItem implements UpdatesItems
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $user
     * @param  mixed  $rows
     * @param  array  $input
     * @return void
     */
    public function update($user, $rows, array $input)
    {
        //Gate::forUser($user)->authorize('update', $rows);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateItem');

        $rows->forceFill($input)->save();
    }
}
