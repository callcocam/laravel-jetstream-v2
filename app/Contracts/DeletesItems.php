<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Contracts;

interface DeletesItems
{
    /**
     * Delete the given row.
     *
     * @param  mixed  $row
     * @return void
     */
    public function delete($row);
}
