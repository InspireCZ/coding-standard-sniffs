<?php declare(strict_types = 1);

namespace Inspire\Sniffs\ControlStructures;

use Inspire\Sniffs\TestCase;

class DisallowHashCommentsSniffTest extends TestCase
{

    public function testNoErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/disallowHashCommentsNoErrors.php');
        self::assertNoSniffErrorInFile($report);
    }

    public function testErrors(): void
    {
        $report = self::checkFile(__DIR__ . '/data/disallowHashCommentsErrors.php');

        self::assertSame(2, $report->getErrorCount());
        self::assertSniffError($report, 7, 'HashCommentNotAllowed');
        self::assertSniffError($report, 9, 'HashCommentNotAllowed');
    }

}
