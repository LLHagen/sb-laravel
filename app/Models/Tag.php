<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    public function getRouteKeyName():string
    {
        return 'name';
    }

    public static function tagsCloud()
    {
        return (new static)
            ->has('articlePublished')
            ->get();
    }

    public function articlePublished(): BelongsToMany
    {
        return $this->belongsToMany(Article::class)
            ->where('published','=', true);
    }
}
