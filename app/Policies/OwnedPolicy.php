<?php

namespace App\Policies;

use App\Models\Collective;
use App\Models\Owned;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnedPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Collective $collective)
    {
        return auth_collective()->id === $collective->id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Collective $collective, Owned $owned)
    {
        return $collective->id === $owned->collective_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Collective $collective)
    {
        return auth_collective()->id === $collective->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Collective $collective, Owned $owned)
    {
        return $collective->id === $owned->collective_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Collective $collective, Owned $owned)
    {
        return $collective->id === $owned->collective_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Collective $collective, Owned $owned)
    {
        return $collective->id === $owned->collective_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Collective $collective, Owned $owned)
    {
        return $collective->id === $owned->collective_id;
    }
}
