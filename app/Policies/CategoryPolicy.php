<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\Collective;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CategoryPolicy
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
        return Auth::check();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Collective $collective, Category $category)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Collective  $collective
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Collective $collective)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Collective $collective, Category $category)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Collective $collective, Category $category)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Collective $collective, Category $category)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Collective  $collective
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Collective $collective, Category $category)
    {
        return Auth::check();
    }
}
