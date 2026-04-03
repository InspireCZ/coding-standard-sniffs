<?php declare(strict_types = 1);

class InlineCommentSpacingValid
{
    public function test(): void
    {
        // This is a valid comment
        $a = 1; // Also valid
    }
}
