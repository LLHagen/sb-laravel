<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Feedback;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Moderator',
            'slug' => 'moderator',
            'description' => '',
        ]);
        Role::create([
            'name' => 'User',
            'slug' => 'user',
            'description' => '',
        ]);

        Feedback::factory(10)->create();

        User::factory(2)->create();

        $tags = Tag::factory(6)->create();

        $articles = Article::factory(30)
            ->state(new Sequence(
                function ($sequence) {
                    return ['owner_id' => User::all()->random()];
                },
            ))
            ->create();

        $tagsIds = $tags->modelKeys();
        foreach ($articles as $article) {
            $randTagsKeys = array_rand(array_flip($tagsIds), 3);
            $article->tags()->attach($randTagsKeys);
        }

        $roles = Role::all();
        $rolesIds = $roles->modelKeys();
        foreach (User::all() as $user) {
            $randRolesKeys = array_rand(array_flip($rolesIds));
            $user->roles()->attach($randRolesKeys);
        }
    }
}
