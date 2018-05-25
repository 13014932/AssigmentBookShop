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


    //method to test NEW BOOK
    public function testCreateBook()
    {

//        $book_data = ['name' => 'varun', 'price' => 1.2, 'quantity' => 1, 'author_name' => ''];


        /*
         *
         using closures ...done   ******************************************************/


        //        $closure = function ($name) {

        //
        //            $compare = $name;
        //            switch ($compare) {
        //                case 'name':
        //                    return 'surname';
        //                    break;
        //                case 'varun':
        //                    return 'batra';
        //                    break;
        //                case 'satpal':
        //                    return 'khatana';
        //                    break;
        //                default:
        //                    return false;
        //                    break;
        //            }
        //        };
        //
        //        $test =$this->getMockBuilder(SomeClass::class)
        //            ->setMethods(['set'])
        //            ->getMock();
        //
        //
        //        $test->expects($this->any())
        //            ->method('set')
        //            ->will($this->returnCallback($closure));
        //
        //        $this->assertEquals($test->set('name'), 'surname');
        //        $this->assertEquals($test->set('varun'), 'batra');
        //        $this->assertEquals($test->set('satpal'), 'khatana');
        //        $this->assertFalse($test->set('default'));


                /*
                 *
                   withConsecutive() method... done      ***********************************************************************/


//        $mock = $this->getMockBuilder(BookLib::class)
//            ->setMethods(['set'])
//            ->getMock();
//
//        $mock->expects($this->exactly(4))
//            ->method('set')
//            ->withConsecutive(
//                [$this->lessThanOrEqual(8)],
//                [$this->greaterThan(0)],
//                [$this->greaterThan(0)],
//                [$this->equalTo('')]
//            );
//
//        $mock->set(strlen($book_data['name']));
//        $mock->set($book_data['price']);
//        $mock->set($book_data['quantity']);
//        $mock->set($book_data['author_name']);



        /*
         *
        with- Stubbing a method call to return the value from a map...done  ****
        **************************************************************/


        // Create a stub for the SomeClass class.

        $stub = $this->createMock(SomeClass::class);

        // Create a map of arguments to return values.
        $map = [
            ['satpal', 'name'],
            ['e', 'f', 'g', 'h']
        ];

        // Configure the stub.
        $stub->method('doSomething')
            ->will($this->returnValueMap($map));

        // $stub->doSomething() returns different values depending on
        // the provided arguments.
        $this->assertSame('name', $stub->doSomething('satpal'));
        $this->assertSame('h', $stub->doSomething('e', 'f', 'g'));



//        BookLib::createBook($book_data);

         }


//method to test update BOOK
//    public function testUpdateBook()
//    {
//
//
//        BookLib::updateBook(['id' => 33, 'name' => 'mybook', 'price' => 1, 'quantity' => 1]);
//
//
//    }

//method to delete book
//  public function testDeleteBook()
//  {
//
//      BookLib::deleteBook( 220);
//  }
}
