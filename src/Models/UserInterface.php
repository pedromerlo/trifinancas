<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 19/04/2017
 * Time: 17:21
 */

namespace TRIFin\Models;


interface UserInterface
{

    public function getId():int;
    public function getFullname():string ;
    public function getEmail():string ;
    public function getPassword():string ;

}