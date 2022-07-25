<?php

declare(strict_types=1);

namespace ProxyManager\ProxyGenerator\Assertion;

use BadMethodCallException;
use ProxyManager\Exception\InvalidProxiedClassException;
use ReflectionClass;
use ReflectionMethod;

use function array_filter;

/**
 * Assertion that verifies that a class can be proxied
 */
final class CanProxyAssertion
{
    /**
     * Disabled constructor: not meant to be instantiated
     *
     * @throws BadMethodCallException
     */
    public function __construct()
    {
        throw new BadMethodCallException('Unsupported constructor.');
    }

    /**
     * @throws InvalidProxiedClassException
     */
    public static function assertClassCanBeProxied(ReflectionClass $originalClass, bool $allowInterfaces = true): void
    {
        self::isNotFinal($originalClass);
        self::hasNoAbstractProtectedMethods($originalClass);

        if ($allowInterfaces) {
            return;
        }

        self::isNotInterface($originalClass);
    }

    /**
     * @throws InvalidProxiedClassException
     */
    private static function isNotFinal(ReflectionClass $originalClass): void
    {
        if ($originalClass->isFinal()) {
            throw InvalidProxiedClassException::finalClassNotSupported($originalClass);
        }
    }

    /**
     * @throws InvalidProxiedClassException
     */
    private static function hasNoAbstractProtectedMethods(ReflectionClass $originalClass): void
    {
        $protectedAbstract = array_filter(
            $originalClass->getMethods(),
            static function (ReflectionMethod $method): bool {
                return $method->isAbstract() && $method->isProtected();
            }
        );

        if ($protectedAbstract) {
            throw InvalidProxiedClassException::abstractProtectedMethodsNotSupported($originalClass);
        }
    }

    /**
     * @throws InvalidProxiedClassException
     */
    private static function isNotInterface(ReflectionClass $originalClass): void
    {
        if ($originalClass->isInterface()) {
            throw InvalidProxiedClassException::interfaceNotSupported($originalClass);
        }
    }
}
