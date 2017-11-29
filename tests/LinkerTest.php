<?php

namespace Tests;

use App\Utilities\Linker;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Utilities\Linker
 */
class LinkerTest extends TestCase
{
    /**
     * @covers \App\Utilities\Linker::autolink()
     */
    public function testAutoLink()
    {
        // arrange
        $text = '測試文章內容 http://www.google.com.tw …';
        $expected = '測試文章內容 <a href="http://www.google.com.tw">http://www.google.com.tw</a> …';
        $target = new Linker();

        // act
        $actual = $target->autolink($text);

        // assert
        $this->assertEquals($expected, $actual);
    }
}