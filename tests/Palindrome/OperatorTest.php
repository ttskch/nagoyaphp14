<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku14\Palindrome;

use PHPUnit\Framework\TestCase;

class OperatorTest extends TestCase
{
    /**
     * @var Operator
     */
    protected $operator;

    public function setUp()
    {
        $this->operator = new Operator();
    }

    /**
     * @dataProvider compareDataProvider
     */
    public function testCompare($a, $b, $base, $expected)
    {
        $this->assertEquals($expected, $this->operator->compare($a, $b, $base));
    }

    public function compareDataProvider()
    {
        return [
            ['1', '1', 3, 0],
            ['123', '124', 10, -1],
            ['10', 'f', 16, 1],
        ];
    }

    /**
     * @dataProvider incrementDataProvider
     */
    public function testIncrement($number, $base, $expected)
    {
        $this->assertEquals($expected, $this->operator->increment($number, $base));
    }

    public function incrementDataProvider()
    {
        return [
            ['9', 10, '10'],
            ['14', 5, '20'],
            ['fff', 16, '1000'],
        ];
    }

    /**
     * @dataProvider cutIntoHalfDataProvider
     */
    public function testCutIntoHalf($number, $expected)
    {
        $this->assertEquals($expected, $this->operator->cutIntoHalf($number));
    }

    public function cutIntoHalfDataProvider()
    {
        return [
            ['1', ['1', '1']],
            ['12', ['1', '2']],
            ['123', ['12', '23']],
            ['12345', ['123', '345']],
        ];
    }
}
