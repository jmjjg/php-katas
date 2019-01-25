<?php
namespace Katas;

class Diamond
{
    protected static function line($idx, $min, $target)
    {
        $result = '';
        $left = $target-$idx;
        $result .= str_repeat(' ', $left);
        $result .= chr($idx);

        if ($idx !== $min) {
            $result .= str_repeat(' ', ($idx-$min-1)*2+1);
            $result .= chr($idx);
        }

        $result .= "\n";
        return $result;
    }
    public static function toString(string $letter):string
    {
        $result = '';
        $min = 65;
        $target = ord($letter);

        for ($idx=$min; $idx<=$target; $idx++) {
            $result .= static::line($idx, $min, $target);
        }
        for ($idx=$target-1; $idx>=$min; $idx--) {
            $result .= static::line($idx, $min, $target);
        }

        return rtrim($result);
    }
}
