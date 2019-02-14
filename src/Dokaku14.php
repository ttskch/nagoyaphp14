<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku14;

class Dokaku14
{
    public function run(string $input): int
    {
        list($min, $max, $base) = array_map(function (string $v) {
            return intval($v);
        }, explode(',', $input));

        $count = 0;

        for ($i = $min; $i < $max; $i++) {
            $number = base_convert(strval($i), 10, $base);

            if ($this->isPalindrome($number)) {
                $count++;
            }
        }

        return $count;
    }

    private function isPalindrome(string $str): bool
    {
        return $str === strrev($str);
    }
}
