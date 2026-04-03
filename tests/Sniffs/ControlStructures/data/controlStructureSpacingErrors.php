<?php declare(strict_types = 1);

class ControlStructureSpacingInvalid
{
    public function test(): void
    {
        if  (true) {
            return;
        }

        while  (false) {
            break;
        }
    }
}
