<?php declare(strict_types = 1);

class BlankLinesBeforeReturnInvalid
{
    public function test(): int
    {
        $a = 1;
        $b = 2;
        $c = $a + $b;
        return $c;
    }
}
