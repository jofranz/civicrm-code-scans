<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withAutoloadPaths([
        __DIR__ . '~/repositories/civicrm-core',
    ])
    ->withRules([
        InlineConstructorDefaultToPropertyRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\BoolReturnTypeFromStrictScalarReturnsRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationBasedOnParentClassMethodRector::class,
        Rector\TypeDeclaration\Rector\FunctionLike\AddParamTypeSplFixedArrayRector::class,
        Rector\DeadCode\Rector\PropertyProperty\RemoveNullPropertyInitializationRector::class,
        Rector\Visibility\Rector\ClassMethod\ExplicitPublicClassMethodRector::class,
        Rector\Visibility\Rector\ClassMethod\ChangeMethodVisibilityRector::class,
        Rector\CodeQuality\Rector\Ternary\ArrayKeyExistsTernaryThenValueToCoalescingRector::class,
        Rector\CodeQuality\Rector\Identical\BooleanNotIdenticalToNotIdenticalRector::class,
    ])
    ->withSkip([
        Rector\Php54\Rector\Array_\LongArrayToShortArrayRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\BoolReturnTypeFromStrictScalarReturnsRector::class,
        Rector\DeadCode\Rector\Foreach_\RemoveUnusedForeachKeyRector::class,
        Rector\Php73\Rector\FuncCall\JsonThrowOnErrorRector::class,
        Rector\Php71\Rector\List_\ListToArrayDestructRector::class,
        Rector\Php53\Rector\Ternary\TernaryToElvisRector::class,
    ])
    ->withPhpVersion(PhpVersion::PHP_74)
    ->withSets([
        LevelSetList::UP_TO_PHP_83,
        Rector\Set\ValueObject\SetList::DEAD_CODE,
    ]);
