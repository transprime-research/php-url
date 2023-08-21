<?php

namespace Transprime\Url\Tests;

use PHPUnit\Framework\TestCase;
use Transprime\Url\Url;

class UrlTest extends TestCase
{
    public function testPackageIsCreated(): void
    {
        $this->assertIsObject(new Url());
    }

    public function testUrlIsCorrect()
    {
        $url = Url::make()
            ->setScheme('http://')
            ->setDomain('localhost')
            ->setPort('8080')
            ->setPath('/api/hello')
            ->addToQuery('name', 'John')
            ->addToQuery('public', 'yes');

        $this->assertEquals([
            'http://',
            'localhost',
            ':8080',
            '/api/hello',
            '?',
            'name=John&public=yes',
        ], $url->toArray());

        $this->assertEquals('http://localhost:8080/api/hello?name=John&public=yes', (string) $url);
    }
}