<?php declare(strict_types = 1);

class MultilineIfBracketInvalid
{
    public function test(): void
    {
        $a = 1;
        $b = 2;

        if (
            $a === 1
            && $b === 2
        )
        {
            return;
        }
    }
}
