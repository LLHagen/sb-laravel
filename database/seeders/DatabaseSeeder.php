<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Feedback;
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
        User::create([
            'name' => 'Игорь Смирнов',
            'email' => 'igor-smirnov-94@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('123123'), // password
            'remember_token' => Str::random(10),
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

    }
}
