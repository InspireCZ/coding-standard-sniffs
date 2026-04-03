<?php declare(strict_types = 1);

namespace Tests;

use Tracy\Debugger;

class DisallowTracyDumpInvalid
{
    public function test(): void
    {
        dump('hello');
        bdump('hello');
        \Tracy\Debugger::dump('hello');
        \Tracy\Debugger::barDump('hello');
    }
}
