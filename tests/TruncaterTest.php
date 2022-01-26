<?php

namespace Ood\Tests;

use PHPUnit\Framework\TestCase;
use Ood\Truncater;

class TruncaterTest extends TestCase
{
    public function testTruncate(): void
    {
        $truncater = new Truncater();

        $actual = $truncater->truncate('one two');
        $this->assertEquals('one two', $actual);

        $actual = $truncater->truncate('one two', ['length' => 6]);
        $this->assertEquals('one tw...', $actual);

        $actual = $truncater->truncate('one two', ['separator' => '.']);
        $this->assertEquals('one two', $actual);

        $actual = $truncater->truncate('one two', ['length' => '3']);
        $this->assertEquals('one...', $actual);

        $truncater = new Truncater(['length' => 3]);

        $actual = $truncater->truncate('one two');
        $this->assertEquals('one...', $actual);

        $actual = $truncater->truncate('one two', ['separator' => '!']);
        $this->assertEquals('one!', $actual);

        $actual = $truncater->truncate('one two');
        $this->assertEquals('one...', $actual);
    }
}
