<?php

namespace Illuminate\Tests\Support;

use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class SupportPluralizerTest extends TestCase
{
    public function testBasicSingular()
    {
        $this->assertEquals('child', Str::singular('children'));
    }

    public function testBasicPlural()
    {
        $this->assertEquals('children', Str::plural('child'));
        $this->assertEquals('cod', Str::plural('cod'));
    }

    public function testCaseSensitiveSingularUsage()
    {
        $this->assertEquals('Child', Str::singular('Children'));
        $this->assertEquals('CHILD', Str::singular('CHILDREN'));
        $this->assertEquals('Test', Str::singular('Tests'));
    }

    public function testCaseSensitiveSingularPlural()
    {
        $this->assertEquals('Children', Str::plural('Child'));
        $this->assertEquals('CHILDREN', Str::plural('CHILD'));
        $this->assertEquals('Tests', Str::plural('Test'));
    }

    public function testIfEndOfWordPlural()
    {
        $this->assertEquals('VortexFields', Str::plural('VortexField'));
        $this->assertEquals('MatrixFields', Str::plural('MatrixField'));
        $this->assertEquals('IndexFields', Str::plural('IndexField'));
        $this->assertEquals('VertexFields', Str::plural('VertexField'));
    }

    public function testPluralWithNegativeCount()
    {
        $this->assertEquals('test', Str::plural('test', 1));
        $this->assertEquals('tests', Str::plural('test', 2));
        $this->assertEquals('test', Str::plural('test', -1));
        $this->assertEquals('tests', Str::plural('test', -2));
    }
}
