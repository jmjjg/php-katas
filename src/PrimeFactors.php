<?php
namespace Katas;

class PrimeFactors
{
    public function generate(int $number):array
    {
        $result = [];
        $value = $number;
        for ($divisor = 2; $divisor <= $value; $divisor++) {
            while ($value%$divisor === 0) {
                $result[] = $divisor;
                $value = $value/$divisor;
            }
        }
        \sort($result);
        return $result;
    }
}
