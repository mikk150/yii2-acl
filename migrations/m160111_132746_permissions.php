<?php

use yii\db\Migration;

class m160111_132746_permissions extends Migration
{
    public function up()
    {
        $this->createTable('acl_permissions', [
            'id' => 'pk',
            'permission' => 'string',
            'description' => 'text',
        ]);
    }

    public function down()
    {
        $this->dropTable('acl_permissions');
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
