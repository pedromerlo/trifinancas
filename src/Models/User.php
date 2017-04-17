<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 11/04/2017
 * Time: 12:32
 */

namespace TRIFin\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //Segurança na hidratação dos dados no modo massivo
    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'password'
    ];
}