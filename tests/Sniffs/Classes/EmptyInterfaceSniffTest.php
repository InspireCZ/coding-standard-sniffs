<?php declare(strict_types = 1);

namespace Inspire\Sniffs\Classes;

use Inspire\Sniffs\TestCase;

class EmptyInterfaceSniffTest extends TestCase
{

    public function testNoErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/emptyInterfaceNoErrors.php');
        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/emptyInterfaceErrors.php');

        self::assertSame(1, $report->getErrorCount());
        self::assertSniffError($report, 5, 'Invalid');
    }

}
