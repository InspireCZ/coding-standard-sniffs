<?php declare(strict_types = 1);

class MultilineMethodBracketValid
{
    public function singleLine(int $a, int $b): void
    {
    }

    public function multiline(
        int $a,
        int $b,
    ) {
    }

    abstract public function abstractMultiline(
        int $a,
        int $b,
    ): void;
}
