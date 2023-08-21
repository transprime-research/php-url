<?php

namespace Transprime\Package\Tests;

use PHPUnit\Framework\TestCase;
use Transprime\Package\{Package, Exceptions\PackageException};

class PackageTest extends TestCase
{
    public function testPackageIsCreated()
    {
        $this->assertIsObject(new Package());
    }
}