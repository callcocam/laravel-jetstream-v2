<?php

namespace App\Actions;

use Illuminate\Support\Facades\Gate;

class ValidateDeletion
{
    /**
     * Validate that the team can be deleted by the given user.
     *
     * @param  mixed  $user
     * @param  mixed  $item
     * @return void
     */
    public function validate($user, $item)
    {
        Gate::forUser($user)->authorize('delete', $item);

    }
}
