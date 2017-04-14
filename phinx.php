<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 07/04/2017
 * Time: 14:40
 */
require __DIR__."/vendor/autoload.php";

/*Carrega as configurações de acesso ao database*/
$db = include __DIR__."/config/db.php";

/* para conversão para o formato do phinx */
list(
    'driver'=>$adapter,
    'host'=>$host,
    'database'=>$name,
    'username'=>$user,
    'password'=>$pass,
    'charset'=>$charset,
    'collation'=>$collation
    )=$db['development'];



return [
    'paths'=>[
        'migrations'=>[
            __DIR__ . '/db/migrations'
        ],
        'seeds'=>[
            __DIR__.'/db/seeds'
        ],
    ],
    'environments'=>[
        'default_migration_table'=>'migrations',
        'default_database'=>'development',
        'development'=>[
            'adapter'=>$adapter,
            'host'=>$host,
            'name'=>$name,
            'user'=>$user,
            'pass'=>$pass,
            'charset'=>$charset,
            'collation'=>$collation
        ]
    ]
];

