<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    public function run()
    {
        factory(App\Tag::class, 10)->create();
    }
}
