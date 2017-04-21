<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 11/04/2017
 * Time: 12:32
 */

namespace TRIFin\Models;


use Illuminate\Database\Eloquent\Model;

class BillPay extends Model
{
    //Segurança na hidratação dos dados no modo massivo
    protected $fillable=[
        'date_launch',
        'name',
        'value',
        'user_id',
        'category_cost_id'
    ];
    public function categoryCost(){
        //uma categoria pode estar em muitas contas a pagar
        //uma conta a pagar tem uma categoria
        return $this->belongsTo(CategoryCost::class);
    }

}