<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lib\Crud\Book as BookLib;
use Illuminate\Support\Facades\Validator;

class MyException extends \Exception
{
    public function errorMessage()
    {
        //error message

        $errorMsg = ' Error => ' . $this->getMessage() ;
        return $errorMsg;
    }
}
class BookTest extends TestCase

{
    /**
     * A basic test example.
     *
     * @return void
     */

    //multiple catches
    //method to test NEW BOOK
    public function testCreateBook()
    {

        $book_data = ['name' => 'varun', 'price' => 1, 'quantity' => 1];

        try {

            if(strlen($book_data['name']) > 8) {

                throw new MyException("The Book name may not be greater than 8 characters");
            }

            if(($book_data['price'] ) < 0 ) {
                throw new MyException("The price must be at least 1");
            }
            if(($book_data['quantity'] ) < 0 ) {
                throw new \Exception("The quantity must be at least 1");
            }
            BookLib::createBook($book_data);
        }

        catch (MyException $e) {
            echo $e->errorMessage();
        }
       
        catch(\Exception $e) {
            echo $e->getMessage();
        }

        /*  below code  with laravel validation (commented)*/

//        try {
//
////            $book_name = 'varun';
//            $book_data = ['name' => 'varun', 'price' => 1, 'quantity' => 1];
//
////    *sub-comment        $this->assertLessThanOrEqual(8, strlen($book_name));
//
//            $validator = Validator::make($book_data, [
//                'name' => 'required|max:8',
//                'price' => 'required|integer|min:1',
//                'quantity' => 'required|integer|min:1',
//
//            ]);
//
//            if ($validator->fails()) {
//
//                $errors = $validator->errors()->all();
//
////      *sub-comment        log::info(implode(" ",$errors)) ;
////
////      *sub-comment       $this->fail( "error 101" );
//                throw new \Exception (implode(" ", $errors));
//            }
//
//            BookLib::createBook($book_data);
//
//
//        } catch (\Exception $e) {
//
////     *sub-comment    $this->assertEquals( "error in validate", $e->getMessage());
////     *sub-comment    log::error($e->getMessage());
//            echo $e->getMessage();
//
//        }


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
