<?php
namespace Katas\Tests;

use Katas\RomanNumerals;
use PHPUnit\Framework\TestCase;

final class RomanNumeralsTest extends TestCase
{
    /**
     * @dataProvider romanProvider
     */
    public function testRoman(int $arab, string $expected)
    {
        $this->assertEquals($expected, (new RomanNumerals)->to($arab));
    }

    public function romanProvider()
    {
        // https://www.roman-numerals.org/chart100.html
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [15, 'XV'],
            [48, 'XLVIII'],
            [49, 'XLIX'],
            [50, 'L'],
            [90, 'XC'],
            [99, 'XCIX'],
            [100, 'C'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M']
        ];
    }
}
