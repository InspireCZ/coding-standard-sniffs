<?php declare(strict_types = 1);

class DisallowHashCommentsValid
{
    public function test(): void
    {
        // This is a valid comment
        $a = 1; // Also valid
    }
}
