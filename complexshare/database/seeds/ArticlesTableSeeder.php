<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Comment;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Article::class, 30)
        ->create()
        ->each(function ($article) {
            $comments = factory(App\Comment::class, 2)->make();
            $article->comments()->saveMany($comments);
        });
    }
}
