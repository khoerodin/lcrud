<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title'       => ucfirst($faker->words(rand(1, 3), true)),
        'content'     => ucfirst($faker->words(rand(1, 10), true)),
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
    return [
        'name'          => strtolower($faker->words(rand(1, 1), true)),
        'description'   => ucfirst($faker->words(rand(1, 5), true)),
    ];
});

$factory->define(App\ArticleTag::class, function (Faker $faker) {
    return [
        'article_id' => function () {
            return factory(App\Article::class)->create()->id;
        },
        'tag_id' => function () {
            return factory(App\Tag::class)->create()->id;
        },
    ];
});
