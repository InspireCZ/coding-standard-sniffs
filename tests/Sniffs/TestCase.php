<?php declare(strict_types = 1);

namespace Inspire\Sniffs;

use PHP_CodeSniffer\Config;
use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Files\LocalFile;
use PHP_CodeSniffer\Runner;
use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Util\Common;
use function array_map;
use function count;
use function define;
use function defined;
use function implode;
use function preg_replace;
use function sprintf;
use function strlen;
use function strpos;
use function substr;
use const PHP_EOL;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{

    /**
     * @param array<string, mixed> $sniffProperties
     */
    protected static function checkFile(string $filePath, array $sniffProperties = []): File
    {
        if (defined('PHP_CODESNIFFER_CBF') === false) {
            define('PHP_CODESNIFFER_CBF', false);
        }

        $codeSniffer = new Runner();
        $codeSniffer->config = new Config(['-s']);
        $codeSniffer->init();

        if (count($sniffProperties) > 0) {
            foreach ($sniffProperties as $name => $value) {
                $sniffProperties[$name] = [
                    'value' => $value,
                    'scope' => 'sniff',
                ];
            }

            $codeSniffer->ruleset->ruleset[self::getSniffName()]['properties'] = $sniffProperties;
        }

        $sniffClassName = static::getSniffClassName();
        /** @var Sniff $sniff */
        $sniff = new $sniffClassName();

        $codeSniffer->ruleset->sniffs = [$sniffClassName => $sniff];
        $codeSniffer->ruleset->populateTokenListeners();

        $file = new LocalFile($filePath, $codeSniffer->ruleset, $codeSniffer->config);
        $file->process();

        return $file;
    }

    protected static function assertNoSniffErrorInFile(File $phpcsFile): void
    {
        $errors = $phpcsFile->getErrors();
        $text = sprintf('No errors expected, but %d errors found:', count($errors));

        foreach ($errors as $line => $error) {
            $text .= sprintf(
                '%sLine %d:%s%s',
                PHP_EOL,
                $line,
                PHP_EOL,
                self::getFormattedErrors($error),
            );
        }

        self::assertEmpty($errors, $text);
    }

    protected static function assertSniffError(File $phpcsFile, int $line, string $code, ?string $message = null): void
    {
        $errors = $phpcsFile->getErrors();
        self::assertTrue(isset($errors[$line]), sprintf('Expected error on line %s, but none found.', $line));

        $sniffCode = sprintf('%s.%s', self::getSniffName(), $code);

        self::assertTrue(
            self::hasError($errors[$line], $sniffCode, $message),
            sprintf(
                'Expected error %s%s, but none found on line %d.%sErrors found on line %d:%s%s%s',
                $sniffCode,
                $message !== null ? sprintf(' with message "%s"', $message) : '',
                $line,
                PHP_EOL . PHP_EOL,
                $line,
                PHP_EOL,
                self::getFormattedErrors($errors[$line]),
                PHP_EOL,
            ),
        );
    }

    protected static function assertNoSniffError(File $phpcsFile, int $line): void
    {
        $errors = $phpcsFile->getErrors();
        self::assertFalse(
            isset($errors[$line]),
            sprintf(
                'Expected no error on line %s, but found:%s%s%s',
                $line,
                PHP_EOL . PHP_EOL,
                isset($errors[$line]) ? self::getFormattedErrors($errors[$line]) : '',
                PHP_EOL,
            ),
        );
    }

    protected static function assertAllFixedInFile(File $phpcsFile): void
    {
        $phpcsFile->disableCaching();
        $phpcsFile->fixer->fixFile();
        self::assertStringEqualsFile(
            preg_replace('~(\\.php)$~', '.fixed\\1', $phpcsFile->getFilename()),
            $phpcsFile->fixer->getContents(),
        );
    }

    /**
     * @return class-string
     */
    protected static function getSniffClassName(): string
    {
        return substr(static::class, 0, -strlen('Test'));
    }

    protected static function getSniffName(): string
    {
        return Common::getSniffCode(static::getSniffClassName());
    }

    /**
     * @param array<int, array<int, array{source: string, message: string}>> $errorsOnLine
     */
    private static function hasError(array $errorsOnLine, string $sniffCode, ?string $message): bool
    {
        foreach ($errorsOnLine as $errorsOnPosition) {
            foreach ($errorsOnPosition as $error) {
                if (
                    $error['source'] === $sniffCode
                    && ($message === null || strpos($error['message'], $message) !== false)
                ) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param array<int, array<int, array{source: string, message: string}>> $errors
     */
    private static function getFormattedErrors(array $errors): string
    {
        return implode(
            PHP_EOL,
            array_map(
                static fn (array $errors): string => implode(
                    PHP_EOL,
                    array_map(
                        static fn (array $error): string => sprintf("\t%s: %s", $error['source'], $error['message']),
                        $errors,
                    ),
                ),
                $errors,
            ),
        );
    }

}
