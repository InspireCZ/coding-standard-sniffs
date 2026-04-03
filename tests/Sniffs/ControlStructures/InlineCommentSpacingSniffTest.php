<?php declare(strict_types = 1);

namespace Inspire\Sniffs\ControlStructures;

use Inspire\Sniffs\TestCase;

class InlineCommentSpacingSniffTest extends TestCase
{

    public function testNoErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/inlineCommentSpacingNoErrors.php');
        self::assertNoSniffErrorInFile($report);
    }

    public function testMissingSpace(): void
    {
        $report = self::checkFile(__DIR__ . '/data/inlineCommentSpacingErrors.php');

        self::assertSniffError($report, 7, 'InvalidSpacing');
        self::assertSniffError($report, 9, 'InvalidSpacing');
    }

    public function testMissingSpaceBeforeComment(): void
    {
        $report = self::checkFile(__DIR__ . '/data/inlineCommentSpacingBeforeErrors.php');

        self::assertSniffError($report, 7, 'MissingSpaceBeforeComment');
    }

}
