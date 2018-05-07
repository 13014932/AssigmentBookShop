<?php

use Faker\Generator as Faker;
use App\Models\Book;


$factory->define(App\Models\Book::class, function (Faker $faker)

{

    return [

        "name" => $faker->monthName(15),
        "price" => $faker -> numberBetween(111,999),
        "special_price" => $faker->numberBetween(111,999),
        "author_name" => $faker->firstName(),
        "book_created_date" => $faker -> date('2018-05-07'),
        "quantity" => $faker-> numberBetween(1,9),

    ];




});