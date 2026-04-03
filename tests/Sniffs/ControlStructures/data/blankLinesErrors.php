<?php declare(strict_types = 1);

class BlankLinesInvalid
{
    public function test(): void
    {
        $a = 1;
        $b = 2;
        $c = 3;
        if ($a === 1) {
            $a = 2;
        }
        foreach ([1, 2] as $item) {
            $a = $item;
        }
    }
}
