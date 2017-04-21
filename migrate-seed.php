<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 07/04/2017
 * Time: 17:36
 */

echo ("Iniciando a migração......");
exec(__DIR__.'/vendor/bin/phinx rollback -t 0');
exec(__DIR__.'/vendor/bin/phinx migrate');
exec(__DIR__.'/vendor/bin/phinx seed:run -s UsersSeeder');
exec(__DIR__.'/vendor/bin/phinx seed:run -s CategoryCostsSeeder');
exec(__DIR__.'/vendor/bin/phinx seed:run -s BillRecivesSeeder');
exec(__DIR__.'/vendor/bin/phinx seed:run -s BillPaysSeeder');
echo ("Migração finalizada com exito......");