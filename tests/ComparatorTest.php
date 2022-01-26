<?php

namespace Ood\Tests;

use PHPUnit\Framework\TestCase;

use function Ood\Comparator\formNewStr;
use function Ood\Comparator\compare;

class ComparatorTest extends TestCase
{
    public function testCompare(): void
    {
        $this->assertTrue(compare('ab#c', 'ab#c'));

        $this->assertTrue(compare('ab##', 'c#d#'));

        $this->assertFalse(compare('a#c', 'b'));

        $this->assertTrue(compare('#cd', 'cd'));
    }
}
