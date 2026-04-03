<?php declare(strict_types = 1);

namespace Inspire\Sniffs\Methods;

use Inspire\Sniffs\TestCase;

class MultilineMethodArgumentsParenthesisPositionSniffTest extends TestCase
{

    public function testNoErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/multilineParenthesisPositionNoErrors.php');
        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/multilineParenthesisPositionErrors.php');

        self::assertSame(1, $report->getErrorCount());
        self::assertSniffError($report, 7, 'Trailingcomma');
    }

}
