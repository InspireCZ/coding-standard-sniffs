<?php declare(strict_types = 1);

namespace Inspire\Sniffs\ControlStructures;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

final class InlineCommentSpacingSniff implements Sniff
{
    public function register(): array
    {
        return [T_COMMENT];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $commentToken = $tokens[$stackPtr]['content'];

        // Check if the comment starts with `//` or `#`
        if (strpos($commentToken, '//') === 0 || strpos($commentToken, '#') === 0) {
            // Determine the appropriate prefix for the comment (`//` or `#`)
            $prefix = $commentToken[0] === '#' ? '#' : '//';

            // Extract the part after the prefix to verify spacing
            $afterPrefix = \substr($commentToken, \strlen($prefix));

            // Check if it doesn't start with exactly one space
            if ($afterPrefix[0] !== ' ' || (isset($afterPrefix[1]) && $afterPrefix[1] === ' ')) {
                // Build the correct comment
                $fixedComment = $prefix . ' ' . ltrim($afterPrefix);

                // Add an error and offer a fix
                $error = \sprintf('Inline comments must start with "%s " followed by exactly one space', $prefix);
                $fix = $phpcsFile->addFixableError($error, $stackPtr, 'InvalidSpacing');

                if ($fix === true) {
                    $phpcsFile->fixer->replaceToken($stackPtr, $fixedComment);
                }
            }
        }
    }
}
