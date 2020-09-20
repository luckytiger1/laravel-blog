<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param User $user
     * @param Article $article
     * @return bool
     */
    public function edit(User $user, Article $article)
    {
        return current_user() === $article->author;
    }
}
