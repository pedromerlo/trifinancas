<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 11/04/2017
 * Time: 12:32
 */

namespace TRIFin\Models;


use Illuminate\Database\Eloquent\Model;

class BillRecive extends Model
{
    //Segurança na hidratação dos dados no modo massivo
    protected $fillable=[
        'date_launch',
        'name',
        'value',
        'user_id'
    ];
}