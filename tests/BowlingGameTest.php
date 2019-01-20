<?php
namespace Katas\Tests;

use Katas\BowlingGame;
use PHPUnit\Framework\TestCase;

final class BowlingGameTest extends TestCase
{
    protected function rollMany(BowlingGame &$game, int $max, int $pins)
    {
        for ($i=0; $i<$max; $i++) {
            $game->roll($pins);
        }
    }

    public function testGutterGame()
    {
        $game = new BowlingGame();
        $this->rollMany($game, 20, 0);
        $this->assertEquals(0, $game->score());
    }

    public function testAllOnes()
    {
        $game = new BowlingGame();
        $this->rollMany($game, 20, 1);
        $this->assertEquals(20, $game->score());
    }

    public function testOneSpare()
    {
        $game = new BowlingGame();
        $game->roll(5);
        $game->roll(5); // spare
        $game->roll(3);
        $this->rollMany($game, 17, 0);
        $this->assertEquals(16, $game->score());
    }

    public function testPerfectGame()
    {
        $game = new BowlingGame();
        $this->rollMany($game, 12, 10);
        $this->assertEquals(300, $game->score());
    }

    public function testAll5Spares()
    {
        $game = new BowlingGame();
        $this->rollMany($game, 22, 5);
        $this->assertEquals(150, $game->score());
    }
}
