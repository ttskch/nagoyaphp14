<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku14\Palindrome;

use PHPUnit\Framework\TestCase;

class FinderTest extends TestCase
{
    /**
     * @group tmp
     * @dataProvider findNextPalindromeDataProvider
     */
    public function testFindNextPalindrome($number, $base, $leftHalf, $rightHalf, $comparison, $incrementedLeftHalf, $palindromeLength)
    {
        $generator = $this->prophesize(Generator::class);
        $generator->generate($incrementedLeftHalf ?? $leftHalf, $palindromeLength)->shouldBeCalled();

        $operator = $this->prophesize(Operator::class);
        $operator->cutIntoHalf($number)->shouldBeCalled()->willReturn([$leftHalf, $rightHalf]);
        $operator->compare($rightHalf, strrev($leftHalf), $base)->shouldBeCalled()->willReturn($comparison);
        if ($incrementedLeftHalf) {
            $operator->increment($leftHalf, $base)->shouldBeCalled()->willReturn($incrementedLeftHalf);
        }

        $finder = new Finder($generator->reveal(), $operator->reveal());

        $finder->findNextPalindrome($number, $base);
    }

    public function findNextPalindromeDataProvider()
    {
        return [
            [
                '123',
                10,
                '12',
                '23',
                2, // 23 - 21
                '13',
                3, // length of 131
            ],
            [
                '121',
                3,
                '12',
                '21',
                0, // 21 - 21
                '20',
                3, // length of 202
            ],
            [
                '120',
                3,
                '12',
                '20',
                -1, // 20 - 21
                null,
                3, // length of 121
            ],
            [
                '22',
                3,
                '2',
                '2',
                0, // 2 - 2
                '10',
                3, // length of 101
            ],
        ];
    }
}
