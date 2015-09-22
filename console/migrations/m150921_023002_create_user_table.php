<?php

use yii\db\Schema;
use yii\db\Migration;

class m150921_023002_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
        {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('tbl_user', [
            'id' => $this->primaryKey(),
            'uname' => $this->string()->notNull()->unique(),
            'passwd_hash' => $this->string()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        //echo "m150921_023002_create_user_table cannot be reverted.\n";
        //return false;
        $this->dropTable('tbl_user');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
