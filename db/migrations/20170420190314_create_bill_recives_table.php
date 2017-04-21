<?php

use Phinx\Migration\AbstractMigration;

class CreateBillRecivesTable extends AbstractMigration
{

    public function up(){
        $this->table('bill_recives')
            ->addColumn('date_launch','date')
            ->addColumn('name', 'string')
            ->addColumn('value','float' )
            ->addColumn('user_id','integer' )
            ->addColumn('created_at','datetime')
            ->addColumn('updated_at','datetime')
            ->addForeignKey('user_id','users','id')
            ->save();

    }
    public function down(){
        $this->dropTable('bill_recives');
    }
}
