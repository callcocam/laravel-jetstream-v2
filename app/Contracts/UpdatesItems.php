<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Contracts;

interface UpdatesItems
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $user
     * @param  mixed  $rows
     * @param  array  $input
     * @return void
     */
    public function update($user, $rows, array $input);
}
