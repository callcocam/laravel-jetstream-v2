<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Actions;

use App\Contracts\DeletesItems;

class DeleteItem implements DeletesItems
{
    /**
     * Delete the given team.
     *
     * @param  mixed  $row
     * @return void
     */
    public function delete($row)
    {

        $row->purge();
    }
}
