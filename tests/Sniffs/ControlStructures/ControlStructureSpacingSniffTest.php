<?php declare(strict_types = 1);

namespace Inspire\Sniffs\ControlStructures;

use Inspire\Sniffs\TestCase;

class ControlStructureSpacingSniffTest extends TestCase
{

    public function testNoErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/controlStructureSpacingNoErrors.php');
        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/controlStructureSpacingErrors.php');

        self::assertSniffError($report, 7, 'InvalidSpacing');
        self::assertSniffError($report, 11, 'InvalidSpacing');
    }

}
