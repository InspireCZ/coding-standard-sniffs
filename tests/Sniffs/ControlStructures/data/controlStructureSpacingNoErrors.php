<?php declare(strict_types = 1);

class ControlStructureSpacingValid
{
    public function test(): void
    {
        if (true) {
            return;
        }

        while (false) {
            break;
        }

        for ($i = 0; $i < 1; $i++) {
            break;
        }
    }
}
