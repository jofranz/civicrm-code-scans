<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/ext',
    ]);


    $rectorConfig->autoloadPaths([
        // or full directory
//        __DIR__ . '/civicrm-core',
	'~/repositories/civicrm-core',
    ]);



    // register a single rule
    $rectorConfig->import(LevelSetList::UP_TO_PHP_81);
    $rectorConfig->phpVersion(\Rector\Core\ValueObject\PhpVersion::PHP_73);

    $rectorConfig->rules([
        Rector\TypeDeclaration\Rector\Param\ParamTypeFromStrictTypedPropertyRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\BoolReturnTypeFromStrictScalarReturnsRector::class,
        Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationBasedOnParentClassMethodRector::class,
        Rector\TypeDeclaration\Rector\FunctionLike\AddParamTypeSplFixedArrayRector::class,
    ]);
    //Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector::class,

    // define sets of rules
    $rectorConfig->sets([
        Rector\Set\ValueObject\SetList::DEAD_CODE,
    ]);

    $rectorConfig->skip([
#        __DIR__ . '*civix.php',
        Rector\Php54\Rector\Array_\LongArrayToShortArrayRector::class,
        //Rector\Php71\Rector\FuncCall\CountOnNullRector::class,
	//Rector\TypeDeclaration\Rector\ClassMethod\BoolReturnTypeFromStrictScalarReturnsRector::class,
	//Rector\DeadCode\Rector\Foreach_\RemoveUnusedForeachKeyRector::class,
	//Rector\Php73\Rector\FuncCall\JsonThrowOnErrorRector::class,
	Rector\Php71\Rector\List_\ListToArrayDestructRector::class
    ]);

};
