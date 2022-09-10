<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function change(User $user, Article $article): bool
    {
        return $user->id === $article->owner_id;
    }
}
