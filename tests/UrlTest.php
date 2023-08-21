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

    public function testUrlIsCorrectUsingHelper(): void
    {
        $url = \Transprime\Url\url()
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

    public function testUrlIsCorrect(): void
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

    public function testUrlIsCorrectForSetFullDomain(): void
    {
        $url = Url::make()
            ->setFullDomain('http://localhost:8080')
            ->setPath('/api/hello')
            ->addToQuery('name', 'John')
            ->addToQuery('public', 'yes');

        $this->assertEquals([
            'http://localhost:8080',
            '/api/hello',
            '?',
            'name=John&public=yes',
        ], $url->toArray());

        $this->assertEquals('http://localhost:8080/api/hello?name=John&public=yes', (string) $url);
    }

    public function testUrlIsCorrectWhenSetOnConstructor(): void
    {
        $url = Url::make(
            scheme: 'http://',
            domain: 'localhost',
            port: '8080',
            path: '/api/hello',
            query: ['name' => 'John', 'public' => 'yes'],
        );

        $this->assertEquals([
            'http://localhost:8080',
            '/api/hello',
            '?',
            'name=John&public=yes',
        ], $url->toArray());

        $this->assertEquals('http://localhost:8080/api/hello?name=John&public=yes', (string) $url);

        $url = new Url(
            fullDomain: 'http://localhost:8080',
            path: '/api/hello',
            query: ['name' => 'John', 'public' => 'yes'],
        );

        $this->assertEquals([
            'http://localhost:8080',
            '/api/hello',
            '?',
            'name=John&public=yes',
        ], $url->toArray());

        $this->assertEquals('http://localhost:8080/api/hello?name=John&public=yes', (string) $url);
    }
}