<?php

namespace Ood\Tests;

use PHPUnit\Framework\TestCase;
use Ood\Url;

class UrlTest extends TestCase
{

    public function testUrl(): void
    {
        $url = new Url('http://yandex.ru:80?key=value&key2=value2');

        $actual = $url->getScheme();
        $this->assertEquals('http', $actual);

        $actual = $url->getHostName();
        $this->assertEquals('yandex.ru', $actual);

        $actual = $url->getQueryParams();
        $this->assertEquals(['key' => 'value', 'key2' => 'value2'], $actual);

        $actual = $url->getQueryParam('key');
        $this->assertEquals('value', $actual);

        $actual = $url->getQueryParam('key2', 'lala');
        $this->assertEquals('value2', $actual);

        $actual = $url->getQueryParam('new', 'ehu');
        $this->assertEquals('ehu', $actual);
        
        $actual = $url->getQueryParam('new');
        $this->assertEquals(null, $actual);

        $actual = $url->equals(new Url('http://yandex.ru:80?key=value&key2=value2'));
        $this->assertTrue($actual);

        $actual = $url->equals(new Url('http://yandex.ru:80?key=value'));
        $this->assertFalse($actual);
    }
}
