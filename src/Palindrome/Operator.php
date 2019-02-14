<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku14\Palindrome;

class Operator
{
    public function compare(string $a, string $b, int $base): int
    {
        return intval(base_convert($a, $base, 10)) - intval(base_convert($b, $base, 10));
    }

    public function increment(string $number, int $base): string
    {
        $decimal = intval(base_convert($number, $base, 10));

        return base_convert(strval($decimal + 1), 10, $base);
    }

    /**
     * cut $number string into half
     *
     * e.g.
     * when $number is '1', then return ['1', '1']
     * when $number is '12', then return ['1', '2']
     * when $number is '123', then return ['12', '23']
     */
    public function cutIntoHalf(string $number): array
    {
        $centralIndex = (strlen($number) - 1) / 2; // allow fraction

        $lastIndexOfLeftHalf = intval($centralIndex); // floored
        $firstIndexOfRightHalf = intval(ceil($centralIndex)); // ceiled

        $leftHalf = substr($number, 0, $lastIndexOfLeftHalf + 1);
        $rightHalf = substr($number, $firstIndexOfRightHalf);

        return [$leftHalf, $rightHalf];
    }
}
