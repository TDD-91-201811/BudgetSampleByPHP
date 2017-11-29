<?php

namespace Tests;

use App\HelloWord;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\HelloWord
 */
class HelloWorldTest extends TestCase
{
    /**
     * @covers \App\HelloWord::say()
     */
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