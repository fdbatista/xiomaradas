<?php

use app\classes\StaticMembers;
use yii\db\Migration;

class m180829_165801_create_role_table extends Migration {

    public function safeUp() {
        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'name' => $this->string(35)->notNull()->unique(),
                ], StaticMembers::getTableOptions());
        $this->insert('role', ['name' => 'Administrador']);
        $this->insert('role', ['name' => 'Usuario']);
        
        $this->addForeignKey('fk_user_role', 'user', 'role_id', 'role', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown() {
        $this->dropTable('role');
    }

}
