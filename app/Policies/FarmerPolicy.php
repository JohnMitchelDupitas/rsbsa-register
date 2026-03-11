<?php

namespace App\Policies;

use App\Models\Farmer;
use App\Models\User;

class FarmerPolicy
{
    /**
     * Determine if the user can view the farmer record.
     */
    public function view(User $user, Farmer $farmer): bool
    {
        return $user->id === $farmer->user_id;
    }

    /**
     * Determine if the user can update the farmer record.
     */
    public function update(User $user, Farmer $farmer): bool
    {
        return $user->id === $farmer->user_id;
    }

    /**
     * Determine if the user can delete the farmer record.
     */
    public function delete(User $user, Farmer $farmer): bool
    {
        return $user->id === $farmer->user_id;
    }
}
