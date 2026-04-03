<?php declare(strict_types = 1);

class DisallowTracyDumpValid
{
    public function dump(): void
    {
    }

    public function test(): void
    {
        $this->dump();
    }
}
