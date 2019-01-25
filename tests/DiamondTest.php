<?php

namespace Katas\Tests;

use Katas\Diamond;
use PHPUnit\Framework\TestCase;

final class DiamondTest extends TestCase
{

    /**
     * @dataProvider dataDiamond
     */
    public function testDiamond($letter, $expected)
    {
        $this->assertEquals($expected, Diamond::toString($letter));
    }

    public static function dataDiamond()
    {
        $letterA = 'A';

        $letterB = <<<TXT
 A
B B
 A
TXT;
        $letterC = <<<TXT
  A
 B B
C   C
 B B
  A
TXT;
        $letterD = <<<TXT
   A
  B B
 C   C
D     D
 C   C
  B B
   A
TXT;
        $letterE = <<<TXT
    A
   B B
  C   C
 D     D
E       E
 D     D
  C   C
   B B
    A
TXT;
        $letterF = <<<TXT
     A
    B B
   C   C
  D     D
 E       E
F         F
 E       E
  D     D
   C   C
    B B
     A
TXT;


        return [
            ['A', $letterA],
            ['B', $letterB],
            ['C', $letterC],
            ['D', $letterD],
            ['E', $letterE],
            ['F', $letterF],
        ];
    }
}
