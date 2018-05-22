<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lib\Crud\Book as BookLib;
use Illuminate\Support\Facades\Validator;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    //method to test NEW BOOK
    public function testCreateBook()
    {


        try {

            $book_name = 'varun';
            $book_data = ['name' => $book_name, 'price' => 1, 'quantity' => 1];

//            $this->assertLessThanOrEqual(8, strlen($book_name));

            $validator = Validator::make($book_data, [
                'name' => 'required|max:8',
                'price' => 'required|integer|min:0',
                'quantity' => 'required|integer|min:0',

            ]);

            if ($validator->fails()) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                    'name' => ['Name must be required and should not exceed the limit of eight'],
                    'price' => ['The price must be required and not be negative'],
                    'quantity' => ['Quantity should be required and should not be negative'],
                ]);
                throw $error;
            }

            BookLib::createBook($book_data);


        } catch (\Exception $error) {

            log::error($error->getMessage() . " => on file " . $error->getFile() . " => on line number = " . $error->getLine());

        }


    }

//method to test update BOOK
    public function testUpdateBook()
    {


        BookLib::updateBook(['id' => 33, 'name' => 'mybook', 'price' => 1, 'quantity' => 1]);


    }

//method to delete book
//  public function testDeleteBook()
//  {
//
//      BookLib::deleteBook( 220);
//  }
}
