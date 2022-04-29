<?php

namespace App\Policies;

use App\Models\Collective;
use App\Models\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Collective $collective)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Collective $collective, Member $member)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Collective $collective)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Collective $collective, Member $member)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Collective $collective, Member $member)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Collective $collective, Member $member)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Collective $collective, Member $member)
    {
        //
    }
}
