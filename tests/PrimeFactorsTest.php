<?php
namespace Katas\Tests;

use Katas\PrimeFactors;
use PHPUnit\Framework\TestCase;

final class PrimeFactorsTest extends TestCase
{
    /**
     * @dataProvider generateProvider
     */
    public function testGenerate(int $number, array $expected)
    {
        $this->assertEquals($expected, (new PrimeFactors)->generate($number));
    }

    public function generateProvider()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [7, [7]],
            [8, [2, 2, 2]],
            [9, [3, 3]],
            [10, [2, 5]],
            [15, [3, 5]],
            [30, [2, 3, 5]]
        ];
    }
}
