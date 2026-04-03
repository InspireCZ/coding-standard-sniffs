<?php declare(strict_types = 1);

class InlineCommentSpacingInvalid
{
    public function test(): void
    {
        //missing space
        $a = 1;
        //  too many spaces
    }
}
