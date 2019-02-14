<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku14\Palindrome;

class Finder
{
    /**
     * @var Generator
     */
    private $generator;

    /**
     * @var Operator
     */
    private $operator;

    public function __construct(Generator $generator, Operator $operator)
    {
        $this->generator = $generator;
        $this->operator = $operator;
    }

    public function findNextPalindrome(string $number, int $base): string
    {
        list($leftHalf, $rightHalf) = $this->operator->cutIntoHalf($number);

        $palindromeLength = strlen($number);

        // if the right half is equal to or larger than the reverse of the left half, then the left half must be increment
        //
        // e.g.
        // when $number is 1220, because of "21 > 20" the left half of generated palindrome will be 12 (and the palindrome number will be 1221 which is larger than 1220)
        // but when $number is 1223, because of "21 < 23" the left half must be 13 (and the palindrome number will be 1331 which is larger than 1223)
        if ($this->operator->compare($rightHalf, strrev($leftHalf), $base) >= 0) {
            $halfLength = strlen($leftHalf);
            $leftHalf = $this->operator->increment($leftHalf, $base);

            // if length of left half is increased, then length of generating palindrome also should be increased
            if (strlen($leftHalf) > $halfLength) {
                $palindromeLength++;
            }
        }

        return $this->generator->generate($leftHalf, $palindromeLength);
    }
}
