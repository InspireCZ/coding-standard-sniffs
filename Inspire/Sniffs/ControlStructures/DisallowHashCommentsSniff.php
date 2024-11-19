<?php declare(strict_types = 1);

namespace Inspire\Sniffs\ControlStructures;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

final class DisallowHashCommentsSniff implements Sniff
{
    public function register(): array
    {
        return [T_COMMENT];
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $commentToken = $tokens[$stackPtr]['content'];

        // Check if the comment starts with `#`
        if (\strpos($commentToken, '#') === 0) {
            // Replace the `#` prefix with `//`
            $fixedComment = '// ' . \ltrim(\substr($commentToken, 1));

            // Add an error and offer a fix
            $error = 'Inline comments must start with "//" instead of "#".';
            $fix = $phpcsFile->addFixableError($error, $stackPtr, 'HashCommentNotAllowed');

            if ($fix === true) {
                $phpcsFile->fixer->replaceToken($stackPtr, $fixedComment);
            }
        }
    }
}
