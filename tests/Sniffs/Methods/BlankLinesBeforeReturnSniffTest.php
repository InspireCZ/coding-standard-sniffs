<?php declare(strict_types = 1);

namespace Inspire\Sniffs\Methods;

use Inspire\Sniffs\TestCase;

class BlankLinesBeforeReturnSniffTest extends TestCase
{

    public function testNoErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/blankLinesBeforeReturnNoErrors.php');
        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/blankLinesBeforeReturnErrors.php');

        self::assertSame(1, $report->getErrorCount());
        self::assertSniffError($report, 10, 'Invalid');
    }

}
