<?php

namespace App\Policies;

use App\Models\PersonalAssignment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PersonalAssignmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the personal assignment.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\PersonalAssignment $personalAssignment
     * @return mixed
     */
    public function view(User $user, PersonalAssignment $personalAssignment)
    {
        return $user === $personalAssignment->user();
    }

    /**
     * Determine whether the user can create personal assignments.
     *
     * @param  \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the personal assignment.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\PersonalAssignment $personalAssignment
     * @return mixed
     */
    public function update(User $user, PersonalAssignment $personalAssignment)
    {
        return $user === $personalAssignment->user();
    }

    /**
     * Determine whether the user can delete the personal assignment.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\PersonalAssignment $personalAssignment
     * @return mixed
     */
    public function delete(User $user, PersonalAssignment $personalAssignment)
    {
        return $user === $personalAssignment->user();
    }

    /**
     * Determine whether the user can finish the personal assignment.
     *
     * @param User $user
     * @param PersonalAssignment $personalAssignment
     * @return bool
     */
    public function finish(User $user, PersonalAssignment $personalAssignment)
    {
        return $user === $personalAssignment->user();
    }

    /**
     * Determine whether the user can reset the personal assignment.
     *
     * @param User $user
     * @param PersonalAssignment $personalAssignment
     * @return bool
     */
    public function reset(User $user, PersonalAssignment $personalAssignment)
    {
        return $user === $personalAssignment->user();
    }

    /**
     * Determine whether the user can restore the personal assignment.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\PersonalAssignment $personalAssignment
     * @return mixed
     */
    public function restore(User $user, PersonalAssignment $personalAssignment)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the personal assignment.
     *
     * @param  \App\Models\User $user
     * @param  \App\Models\PersonalAssignment $personalAssignment
     * @return mixed
     */
    public function forceDelete(User $user, PersonalAssignment $personalAssignment)
    {
        return false;
    }
}