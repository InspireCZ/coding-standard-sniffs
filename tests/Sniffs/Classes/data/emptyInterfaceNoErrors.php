<?php declare(strict_types = 1);

interface NonEmptyInterface
{
    public function doSomething(): void;
}

interface InterfaceWithConstant
{
    const string FOO = 'bar';
}
