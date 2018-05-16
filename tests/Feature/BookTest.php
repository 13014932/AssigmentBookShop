<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Lib\Crud\BookShopLib;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{


//temprory- method check Sum of Two Digit.
    public function testCheckSum()
    {
        $data = BookShopLib::sum(3, 2);

        $this->assertEquals(5, $data);
    }

    //Method to test store new book.
    public function testStoreBook()
    {

        $data = ["name" => "mybook",
            "price" => "250",
            "author_name" => "satpal",
            "special_price" => "220",
            "book_created_date" => "2018-06-07",
            "quantity" => "5"];


        $store = new BookShopLib();

        $store->storeNewBook($data);
    }


    //Method to test book update.
    public function testBookUpdate()
    {
        $data = [
            "id" => "10",
            "name" => "mybook",
            "price" => "250",
            "author_name" => "satpal",
            "special_price" => "220",
            "book_created_date" => "2018-06-07",
            "quantity" => "400"];

        $update = new  BookShopLib();

        $update->bookUpdate($data);


    }

//Method to test book delete.

    public function testBookDelete()
    {

        $delete = new  BookShopLib();

        $delete->bookdelete(124);


    }

}
