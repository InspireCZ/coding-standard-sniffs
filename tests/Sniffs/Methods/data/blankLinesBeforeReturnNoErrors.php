<?php declare(strict_types = 1);

class BlankLinesBeforeReturnValid
{
    public function withBlankLine(): int
    {
        $a = 1;

        return $a;
    }

    public function singleReturn(): int
    {
        return 1;
    }
}
