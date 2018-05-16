<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Lib\Crud\BuyBookShopLib;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BuyBookTest extends TestCase
{

    //method to test book is store BOOK AFTER BUY.
    public function teststoreBookAfterBuy(){

            $data=[
                "book_id" => "10",
                "book_price" => "250",
                "model_book_quantity" => "10"
            ];

            $buyedbook=new BuyBookShopLib();
        $buyedbook->storeBookAfterBuy($data);
    }


}
