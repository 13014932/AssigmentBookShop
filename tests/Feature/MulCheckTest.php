<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lib\Crud\Book as BookLib;
class Sum
{
    public function sumOfDigit($num1, $num2)
    {
        return $num1+$num2;

    }


}
class MulCheckTest extends TestCase
{

    /**

     *
     * @dataProvider providerTestData
     */
    public function testMultipleMethod($result_data, $expected_result, $book_data)
    {
//        $get_sum = new Sum();
//
//        $result = $get_sum->sumOfDigit($num1, $num2);


        $this->assertEquals($result_data, $expected_result);

        BookLib::createBook($book_data);
    }

    public function providerTestData()
    {
        $book_data = ['name' => 'varun', 'price' => 1.2, 'quantity' => 1, 'author_name' => ''];
        if ($book_data['author_name'] == '')
        {
            $auth_name=$book_data['author_name']='anonnymous';
        }
        else{
            $auth_name=$book_data['author_name'];
        }

        return array(
            array($book_data['name'], 'varun',$book_data),
            array($book_data['price'], 1.2),
            array($book_data['author_name'], $auth_name),
//            array(2, 2, 4),
//            array(5, 5, 10),

        );
    }
}
