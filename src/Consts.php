<?php

    declare (strict_types = 1);

    namespace Coco\constants;

class Consts extends ConstantsManager
{
    public static function init(): void
    {
        parent::initSystemConstants();
    }

    public static function reInit(): void
    {
        parent::initSystemConstants();
    }

    public static function getAll($parsed = false): array
    {
        return parent::getAllConstants($parsed);
    }

    public static function set($const, $value): void
    {
        parent::setConstants($const, $value);
    }

    public static function get($const, $replaceCallback = null): string
    {
        return parent::getValue($const, $replaceCallback);
    }

    public static function setMulti(array $constants): void
    {
        parent::setMultiConstants($constants);
    }

    public static function remove($const): void
    {
        parent::removeConstant($const);
    }

    public static function has($const): bool
    {
        return parent::hasConstant($const);
    }
}
