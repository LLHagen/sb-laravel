<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'preview',
        'description',
        'published',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
