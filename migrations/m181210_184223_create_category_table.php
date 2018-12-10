<?php

use app\classes\StaticMembers;
use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m181210_184223_create_category_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->unique()
                ], StaticMembers::getTableOptions());
        
        $this->insert('category', ['name' => 'Suciedad']);
        $this->insert('category', ['name' => 'Rigidez facial']);
        $this->insert('category', ['name' => 'Desastre']);
        $this->insert('category', ['name' => 'Infamia']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('category');
    }

}
