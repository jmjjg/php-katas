<?php
namespace Katas;

class BowlingGame
{
    protected $frames = [];

    protected $current = 0;

    public function roll(int $pins)
    {
        if (isset($this->frames[$this->current]) === false) {
            $this->frames[$this->current] = [];
        }

        if (isset($this->frames[$this->current][0]) === false) {
            $this->frames[$this->current][0] = $pins;
            if ($pins === 10) {
                $this->current++;
            }
        } else {
            $this->frames[$this->current][1] = $pins;
            $this->current++;
        }
    }

    public function score():int
    {
        $result = 0;
//        foreach ($this->frames as $idx => $rolls) {
        for ($idx=0; $idx<10; $idx++) {
            $rolls = $this->frames[$idx];
            foreach ($rolls as $roll) {
                $result += $roll;
            }

            // Bonus ?
            if (array_sum($rolls) === 10 && isset($this->frames[$idx+1])) {
                // Spare ? -> 1 next ball
                if (count($rolls) === 2) {
                    $result += $this->frames[$idx+1][0];
                // Strike ? -> 2 next balls
                } else {
                    $result += $this->frames[$idx+1][0];

                    if (isset($this->frames[$idx+1][1])) {
                        $result += $this->frames[$idx+1][1];
                    } elseif (isset($this->frames[$idx+2][0])) {
                        $result += $this->frames[$idx+2][0];
                    }
                }
            }
        }
        return $result;
    }
}
