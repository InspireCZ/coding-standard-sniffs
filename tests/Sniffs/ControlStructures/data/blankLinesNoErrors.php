<?php declare(strict_types = 1);

class BlankLinesValid
{
    public function test(): void
    {
        $a = 1;

        if ($a === 1) {
            $a = 2;
        }

        foreach ([1, 2] as $item) {
            $a = $item;
        }

        switch ($a) {
            case 1:
                if ($a === 1) {
                    $a = 2;
                }
                break;
        }

        do {
            $a++;
        } while ($a < 10);
    }
}
