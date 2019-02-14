<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku14\Palindrome;

class Generator
{
    /**
     * if "12" is passed as $left, then this method generates any one of "1", "11", "121", and "1221" according to $targetLength
     */
    public function generate(string $left, int $targetLength): string
    {
        $left = substr($left, 0, intval(ceil($targetLength / 2)));
        $right = strrev($left);

        if (strlen($left) * 2 > $targetLength) {
            $right = substr($right, 1);
        }

        return $left . $right;
    }
}
