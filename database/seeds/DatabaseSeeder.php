<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Crud\Book;
use App\Models\Crud\BuyBook;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //seed 2 records in books table.
        factory(Book::class, 10)->create();
        //seed 5 records in buybooks table.
        factory(BuyBook::class, 10)->create();
    }
}
