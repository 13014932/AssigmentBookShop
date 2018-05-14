<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Lib\Crud\BookShopLib;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{

//temprory method check Sum of Two Digit.
    public function testCheckSum()
    {
        $data=BookShopLib::sum(3,2);

        $this->assertEquals(5, $data);
    }
//Method to test book update.
    public function testBookUpdate()
    {

        $update=new  BookShopLib();

        

    }
    //Method to test book delete.
    public function testBookDelete(){

        $delete=new  BookShopLib();

        $delete->bookdelete(40);


    }

}
