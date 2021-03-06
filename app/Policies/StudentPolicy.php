<?php

namespace App\Policies;

use App\Model\Student;
use App\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }


    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin' || $user->role == 'operator';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Student  $student
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->role == 'admin' || $user->role == 'operator';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\Model\Student  $student
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role == 'admin' || $user->role == 'operator';
    }
}
