<?php declare(strict_types = 1);

namespace Inspire\Sniffs\ControlStructures;

use Inspire\Sniffs\TestCase;

class BlankLinesSniffTest extends TestCase
{

    public function testNoErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/blankLinesNoErrors.php');
        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/blankLinesErrors.php');

        self::assertSame(1, $report->getErrorCount());
        self::assertSniffError($report, 10, 'Invalid');
    }

}
