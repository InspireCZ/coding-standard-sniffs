<?php declare(strict_types = 1);

namespace Inspire\Sniffs\Methods;

use Inspire\Sniffs\TestCase;

class DisallowTracyDumpMethodsSniffTest extends TestCase
{

    public function testNoErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/disallowTracyDumpNoErrors.php');
        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/disallowTracyDumpErrors.php');

        self::assertSame(4, $report->getErrorCount());
        self::assertSniffError($report, 11, 'Found', "Found disallowed 'dump' call");
        self::assertSniffError($report, 12, 'Found', "Found disallowed 'bdump' call");
        self::assertSniffError($report, 13, 'Found', "Found disallowed '\\Tracy\\Debugger::dump' call");
        self::assertSniffError($report, 14, 'Found', "Found disallowed '\\Tracy\\Debugger::barDump' call");
    }

}
