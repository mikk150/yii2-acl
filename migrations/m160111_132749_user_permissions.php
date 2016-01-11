<?php

use yii\db\Migration;

class m160111_132749_user_permissions extends Migration
{
    public function up()
    {
        $this->createTable('acl_user_permissions', [
            'user_id' => 'integer',
            'permission_id' => 'integer',
            'primary key (user_id,permission_id)',
        ]);
        $this->addForeignKey('acl_up_p', 'acl_user_permissions', 'permission_id', 'acl_permissions', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('acl_user_permissions');
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
