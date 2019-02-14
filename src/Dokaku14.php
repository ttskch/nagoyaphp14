<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku14;

use Nagoyaphp\Dokaku14\Palindrome\Finder;
use Nagoyaphp\Dokaku14\Palindrome\Generator;
use Nagoyaphp\Dokaku14\Palindrome\Operator;

class Dokaku14
{
    /**
     * @var Finder
     */
    private $finder;

    public function __construct()
    {
        $this->finder = new Finder(new Generator(), new Operator());
    }

    public function run(string $input): int
    {
        list($min, $max, $base) = array_map(function (string $v) {
            return intval($v);
        }, explode(',', $input));

        $count = 0;
        $current = base_convert(strval($min - 1), 10, $base);

        while (base_convert($current, $base, 10) < $max) {
            $current = $this->finder->findNextPalindrome($current, $base);
            $count++;
        }

        // last found palindrome number is always larger than (or equal to) max number
        $count--;

        return $count;
    }
}
