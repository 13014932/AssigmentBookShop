<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Lib\Crud\Book as BookLib;

class BookTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
  public function testCreateBook(){


      $book_name='varun';
      $book=BookLib::Create(['name' => $book_name, 'price' => 1.2, 'special_price' => 1.2, 'author_name' => 'varun', 'book_created_date' => now(), 'quantity' => 1]);

      $this->assertEquals($book->name, $book_name);
      $this->assertGreaterThan(0, $book->id);



  }
}
