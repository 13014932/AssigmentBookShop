<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lib\Crud\Book as BookLib;
use Illuminate\Support\Facades\Validator;


class SomeClass
{
    public function doSomething()
    {
        // Do something.
    }
}
class BookTest extends TestCase

{

    /**
     * A basic test example.
     *
     * @return void
     */

    // withConsecutive() method
    //method to test NEW BOOK
    public function testCreateBook()
    {

        $book_data = ['name' => 'varun', 'price' => -1.2, 'quantity' => 1, 'author_name' => ''];

        $mock = $this->getMockBuilder(BookLib::class)
            ->setMethods(['set'])
            ->getMock();

        $mock->expects($this->exactly(4))
            ->method('set')
            ->withConsecutive(
                [$this->lessThanOrEqual(8)],
                [$this->greaterThan(0)],
                [$this->greaterThan(0)],
                [$this->equalTo('')]
            );

        $mock->set(strlen($book_data['name']));
        $mock->set($book_data['price']);
        $mock->set($book_data['quantity']);
        $mock->set($book_data['author_name']);


        // Stubbing a method call to return the value from a map
        // Create a stub for the SomeClass class.

//        $stub = $this->createMock(SomeClass::class);
//
//        // Create a map of arguments to return values.
//        $map = [
//            ['a', 'c', 'd'],
//            ['e', 'f', 'g', 'h']
//        ];
//
//        // Configure the stub.
//        $stub->method('doSomething')
//            ->will($this->returnValueMap($map));
//
//        // $stub->doSomething() returns different values depending on
//        // the provided arguments.
//        $this->assertSame('d', $stub->doSomething('a', 'c'));
//        $this->assertSame('h', $stub->doSomething('e', 'f', 'g'));





//
        BookLib::createBook($book_data);

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
