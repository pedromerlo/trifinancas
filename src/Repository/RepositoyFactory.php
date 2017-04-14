<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 11/04/2017
 * Time: 22:54
 */
declare(strict_types=1);
namespace TRIFin\Repository;

class RepositoyFactory
{
    public static function factory(string $modelClass){
        return new DefaultRepository($modelClass);
    }
}