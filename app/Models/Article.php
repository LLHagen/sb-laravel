<?php

namespace App\Models;

use App\Events\ArticleCreated;
use App\Events\ArticleDeleted;
use App\Events\ArticleUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property integer $id
 * @property integer $owner_id
 * @property string $title
 * @property string $slug
 * @property string $preview
 * @property bool $published
 * @property-read User $owner
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'preview',
        'description',
        'owner_id',
        'published',
    ];

    protected $dispatchesEvents = [
        'created' => ArticleCreated::class,
        'deleted' => ArticleDeleted::class,
        'updated' => ArticleUpdated::class,
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
