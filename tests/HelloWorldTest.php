<?php

namespace Tests;

use App\HelloWord;
use PHPUnit\Framework\TestCase;

class HelloWorldTest extends TestCase
{
    public function testSayHelloWorld()
    {
        // arrange
        $target = new HelloWord();
        $excepted = 'Hello, world';

        // act
        $actual = $target->say();

        // assert
        $this->assertEquals($excepted, $actual);
    }

}