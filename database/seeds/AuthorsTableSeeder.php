<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{

    public function run()
    {
        factory(App\Author::class, 5)->create()
        ->each(function($author){
            $author->posts()->createMany(factory(App\Post::class, 5)->make()->toArray());
        });

        $tags = App\Tag::All();
        App\Post::All()->each(function ($post) use ($tags){
            $post->tags()->saveMany($tags);
         });
    }
}
