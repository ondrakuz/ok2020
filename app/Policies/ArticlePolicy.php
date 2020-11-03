<?php

namespace App\Policies;

use App\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->hasRole('admin') || $user->hasRole('manager')) {
            return Response::allow();
        }
        
        return Response::deny('You do\'nt have permissions to see the administration article overview!');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasRole('admin') || $user->hasRole('manager')) {
            return Response::allow();
        }
        
        return Response::deny('You do\'nt have permissions to create article!');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        if ($user->hasRole('admin') || $user->hasRole('manager')) {
            return Response::allow();
        }
        
        return Response::deny('You do\'nt have permissions to update article!');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        if ($user->hasRole('admin') || $user->hasRole('manager')) {
            return Response::allow();
        }
        
        return Response::deny('You do\'nt have permissions to delete article!');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function restore(User $user, Article $article)
    {
        if ($user->hasRole('admin') || $user->hasRole('manager')) {
            return Response::allow();
        }
        
        return Response::deny('You do\'nt have permissions to restore article!');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Article  $article
     * @return mixed
     */
    public function forceDelete(User $user, Article $article)
    {
        if ($user->hasRole('admin') || $user->hasRole('manager')) {
            return Response::allow();
        }
        
        return Response::deny('You do\'nt have permissions to remove article!');
    }
}
