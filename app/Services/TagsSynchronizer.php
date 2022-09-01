<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, Article $article)
    {
        $syncIds = [];
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $syncIds[] = $tag->id;
        }

        $article->tags()->sync($syncIds);
    }
}
