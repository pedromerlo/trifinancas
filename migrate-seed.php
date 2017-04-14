<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 07/04/2017
 * Time: 17:36
 */
exec("clear");
echo ("Iniciando a migração......");
exec(__DIR__.'/vendor/bin/phinx rollback -t 0');
exec(__DIR__.'/vendor/bin/phinx migrate');
exec(__DIR__.'/vendor/bin/phinx seed:run');
echo ("Migração finalizada com exito......");