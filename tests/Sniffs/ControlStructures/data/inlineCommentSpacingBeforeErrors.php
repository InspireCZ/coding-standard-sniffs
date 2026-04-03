<?php declare(strict_types = 1);

class InlineCommentSpacingBeforeInvalid
{
    public function test(): void
    {
        $a = 1;// no space before comment
    }
}
