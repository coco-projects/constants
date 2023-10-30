<?php

    declare (strict_types = 1);

    namespace Coco\constants;

class ConstantsManager
{
    public static array $constants = [];

    public static function initSystemConstants(): void
    {
        static::setMultiConstants(get_defined_constants());
    }

    public static function reInit(): void
    {
        static::initSystemConstants();
    }

    public static function getValue($const, $replaceCallback = null): string
    {
        $originalName = static::getOriginalConstant($const);
        $value        = static::parseExpression($originalName);
        $value        = static::beforeReturn($replaceCallback, $value);

        return $value;
    }

    public static function dynamicParsing($const, $replaceCallback = null): string
    {
        $value = static::parseExpression($const);
        $value = static::beforeReturn($replaceCallback, $value);

        return $value;
    }

    public static function getAllConstants(): array
    {
        return static::$constants;
    }

    public static function setConstants($const, $value): void
    {
        static::$constants[$const] = $value;
    }

    public static function setMultiConstants(array $constants): void
    {
        array_walk($constants, function ($value, $const) {
            static::setConstants($const, $value);
        });
    }

    public static function removeConstant($const): void
    {
        if (isset(static::$constants[$const])) {
            unset(static::$constants[$const]);
        }
    }

    public static function hasConstant($const): bool
    {
        return isset(static::$constants[$const]);
    }

    public static function toDirectorySeparator($str): string
    {
        return strtr($str, [
            '/'  => DIRECTORY_SEPARATOR,
            '\\' => DIRECTORY_SEPARATOR,
        ]);
    }

    public static function toUrlSeparator($str): string
    {
        return strtr($str, [
            '\\' => '/',
        ]);
    }

    public static function getOriginalConstant($const, $replaceCallback = null): string
    {
        $value = static::$constants[$const] ?? '';
        $value = static::beforeReturn($replaceCallback, $value);

        return $value;
    }

    public static function parseExpression($key): array|string|null
    {
        return preg_replace_callback('/<([^<>]+)>/im', function ($matchs) {
            return static::hasConstant($matchs[1]) ? (string)static::getValue($matchs[1]) : '';
        }, $key);
    }

    public static function beforeReturn(?callable $replaceCallback, $value): string
    {
        (is_callable($replaceCallback)) and ($value = call_user_func($replaceCallback, $value));

        return $value;
    }
}
