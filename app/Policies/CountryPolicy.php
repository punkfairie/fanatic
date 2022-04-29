<?php

namespace App\Policies;

use App\Models\Collective;
use App\Models\Country;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
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
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Collective $collective, Country $country)
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
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Collective $collective, Country $country)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Collective $collective, Country $country)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Collective $collective, Country $country)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Collective $collective, Country $country)
    {
        //
    }
}
