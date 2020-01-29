<?php declare(strict_types = 1);

namespace Inspire\Sniffs\Classes;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * @author David Kurka <david.kurka@inspire.cz>
 */
class EmptyInterfaceSniff implements Sniff
{
    public function register(): array
    {
        return [
            \T_INTERFACE,
        ];
    }

    public function process(File $phpcsFile, $stackPtr): void
    {
        $tokens = $phpcsFile->getTokens();
        $hasFunction = false;

        foreach ($tokens as $token) {
            if (\T_FUNCTION === $token['code']) {
                $hasFunction = true;
            }
        }

        if (false === $hasFunction) {
            $phpcsFile->addError('Interface does not have any function.', $stackPtr, 'Invalid');
        }
    }
}
