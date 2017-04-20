<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 20/04/2017
 * Time: 17:40
 */

function dateParse($date){
    var_dump($date);
    //DD/MM/YYYY -> YYYY-MM-DD
    $dateArray = explode('/',$date);
    //DD,MM,YYYY]
    $dateArray = array_reverse($dateArray);
    //[YYYY,MM,DD]
    return implode('-',$dateArray);
    //YYYY-MM-DD
}

function numberParse($number){
    var_dump($number);
    //1.000,50 -> 1000,50
    $newnumber = str_replace('.','',$number);
    //1000,50 -> 1000.50
    $newnumber = str_replace(',','.',$newnumber);
    return $newnumber;

}
