<?php declare(strict_types = 1);

namespace Inspire\Sniffs\ControlStructures;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Checks for correct spacing after control structures (exactly one space is expected, no more, no less).
 */
final class ControlStructureSpacingSniff implements Sniff
{
    private $controlStructures = [
        T_IF,
        T_ELSE,
        T_ELSEIF,
        T_WHILE,
        T_FOR,
        T_SWITCH,
        T_TRY,
        T_CATCH,
        T_FINALLY,
        T_DO,
        T_MATCH,
    ];

    public function register()
    {
        return $this->controlStructures;
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $nextPtr = $phpcsFile->findNext(T_WHITESPACE, $stackPtr + 1, null, true);

        // Check if the next token is an opening parenthesis.
        if ($tokens[$nextPtr]['code'] === T_OPEN_PARENTHESIS) {
            $spaceContent = $tokens[$stackPtr + 1]['content'];

            // Check for missing or extra spaces.
            if ($tokens[$stackPtr + 1]['code'] !== T_WHITESPACE || $spaceContent !== ' ') {
                $error = 'There must be exactly one space after a control structure keyword';
                $fix = $phpcsFile->addFixableError($error, $stackPtr, 'InvalidSpacing');

                if ($fix) {
                    $phpcsFile->fixer->beginChangeset();

                    // Remove extra spaces if they exist.
                    if ($tokens[$stackPtr + 1]['code'] === T_WHITESPACE) {
                        $phpcsFile->fixer->replaceToken($stackPtr + 1, ' ');
                    } else {
                        // Insert a single space if there is none.
                        $phpcsFile->fixer->addContent($stackPtr, ' ');
                    }

                    $phpcsFile->fixer->endChangeset();
                }
            }
        }
    }
}
