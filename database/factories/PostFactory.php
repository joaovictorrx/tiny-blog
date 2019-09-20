<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(6, true);
    return [
        "title" =>  $title,
        "slug" => Str::slug($title),
        "body" => $faker->text,
        "image" => $faker->imageUrl(640, 480, 'sports'),
        "published" => $faker->boolean(75),
    ]; 
});