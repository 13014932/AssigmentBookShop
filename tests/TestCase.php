<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
}
// Something I ran into a while back while writing tests.

// If intentionally testing code for an exception then it is required to add an annotation above the test method.


// For example if the code will throw IllegalArgumentException.
/**
* @expectedException IllegalArgumentException
*/
public function testMethodThrowsException() {
    // Code that will throw IllegalArgumentException
}
