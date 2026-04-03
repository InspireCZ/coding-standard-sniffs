<?php declare(strict_types = 1);

class DisallowHashCommentsInvalid
{
    public function test(): void
    {
        # This is a hash comment
        $a = 1;
        # Another hash comment
    }
}
