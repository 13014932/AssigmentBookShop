<?php

use Faker\Generator as Faker;
use App\Models\Crud\BuyBook;


$factory->define(BuyBook::class, function (Faker $faker)

{

    return [


        "book_id" => $faker -> numberBetween(111,999),
        "book_price" => $faker->numberBetween(111,999),

        "quantity" => $faker-> numberBetween(1,9),

    ];




});