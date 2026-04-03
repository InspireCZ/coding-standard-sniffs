<?php declare(strict_types = 1);

namespace Inspire\Sniffs\ControlStructures;

use Inspire\Sniffs\TestCase;

class ClosingParenthesisOpeningCurlyBracketSameLineOnMultilineIfSniffTest extends TestCase
{

    public function testNoErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/multilineIfBracketNoErrors.php');
        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/multilineIfBracketErrors.php');

        self::assertSame(1, $report->getErrorCount());
        self::assertSniffError($report, 14, 'If');
    }

}
