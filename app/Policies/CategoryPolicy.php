<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  Category  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view all categories');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return bool
     */
    public function view(User $user, Category $category): bool
    {
        return $user->can('view category', $category);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create category');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return bool
     */
    public function update(User $user, Category $category): bool
    {
        return $user->can('update category', $category);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return bool
     */
    public function delete(User $user, Category $category): bool
    {
        return $user->can('delete category', $category);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return bool
     */
    public function restore(User $user, Category $category): bool
    {
        return $user->can('restore category', $category);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  Category  $category
     * @return bool
     */
    public function forceDelete(User $user, Category $category): bool
    {
        return $user->can('force delete category', $category);
    }
}
