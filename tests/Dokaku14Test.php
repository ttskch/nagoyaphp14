<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku14;

use PHPUnit\Framework\TestCase;

class Dokaku14Test extends TestCase
{
    /**
     * @var Dokaku14
     */
    protected $dokaku14;

    protected function setUp() : void
    {
        $this->dokaku14 = new Dokaku14;
    }

    public function testIsInstanceOfDokaku14() : void
    {
        $actual = $this->dokaku14;
        $this->assertInstanceOf(Dokaku14::class, $actual);
    }
}
