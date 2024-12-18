<?php declare(strict_types = 1);

namespace Inspire\Sniffs\ControlStructures;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Checkes whether closing parenthesis is on the same line as opening curly bracket
 * for `if` with multiline conditions.
 *
 * @author Jirka Hrazdil <jiri.hrazdil@inspire.cz>
 */
class ClosingParenthesisOpeningCurlyBracketSameLineOnMultilineIfSniff implements Sniff
{
    /**
     * Registers the tokens that this sniff wants to listen for.
     */
    public function register()
    {
        return [
            \T_IF,
        ];
    }

    /**
     * @param \PHP_CodeSniffer\Files\File $phpcsFile The PHP_CodeSniffer file where the
     *                                               token was found.
     * @param int $stackPtr The position in the PHP_CodeSniffer
     *                                               file's token stack where the token
     *                                               was found.
     *
     * @return void|int Optionally returns a stack pointer. The sniff will not be
     *                  called again on the current file until the returned stack
     *                  pointer is reached. Return (count($tokens) + 1) to skip
     *                  the rest of the file.
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $token = $tokens[$stackPtr];
        $ifLine = $token['line'];
        $closeParenthesisLine = null;

        $tokenIndex = $stackPtr + 1;
        $tokenCount = \count($tokens);

        while ($tokenIndex < $tokenCount) {
            $currentToken = $tokens[$tokenIndex];

            if (\T_CLOSE_PARENTHESIS === $currentToken['code']) {
                $closeParenthesisLine = $currentToken['line'];
            } elseif (\T_OPEN_CURLY_BRACKET === $currentToken['code']) {
                if ($closeParenthesisLine !== null && $ifLine !== $closeParenthesisLine && $closeParenthesisLine !== $currentToken['line']) {
                    // multiline function signature

                    $fix = $phpcsFile->addFixableError(
                        'For IF conditions with multiline conditions closing parenthesis and opening curly bracket should be on same line.',
                        $tokenIndex,
                        'If',
                    );

                    if ($fix) {
                        $this->fix($phpcsFile, $tokenIndex);
                    }
                }

                return $tokenIndex + 1;
            } elseif (T_CLOSE_CURLY_BRACKET === $currentToken['code']) {
                return $tokenIndex;
            }

            $tokenIndex++;
        }
    }

    /**
     * @return void
     */
    private function fix(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $i = 1;

        while ($stackPtr > $i) {
            $currentToken = $tokens[$stackPtr - $i];

            if ('T_WHITESPACE' === $currentToken['type']) {
                $phpcsFile->fixer->replaceToken($stackPtr - $i, '');
                $i++;
            } else {
                $phpcsFile->fixer->addContent($stackPtr - $i, ' ');
                break;
            }
        }
    }
}
