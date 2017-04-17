<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 17/04/2017
 * Time: 18:10
 */
declare(strict_types=1);
namespace TRIFin\Auth;


interface AuthInterface
{
    public function login(array $credencials):bool;

    public function check():bool;

    public function logout():void;
}