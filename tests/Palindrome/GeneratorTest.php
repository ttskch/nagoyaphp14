<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku14\Palindrome;

use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{
    /**
     * @dataProvider generateDataProvider
     */
    public function testGenerate($left, $targetLength, $expected)
    {
        $generator = new Generator();

        $this->assertEquals($expected, $generator->generate($left, $targetLength));
    }

    public function generateDataProvider()
    {
        return [
            ['123', 1, '1'],
            ['123', 2, '11'],
            ['123', 3, '121'],
            ['123', 4, '1221'],
            ['123', 5, '12321'],
            ['123', 6, '123321'],
        ];
    }
}
