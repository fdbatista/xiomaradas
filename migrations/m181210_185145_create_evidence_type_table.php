<?php

use app\classes\StaticMembers;
use yii\db\Migration;

/**
 * Handles the creation of table `evidence_type`.
 */
class m181210_185145_create_evidence_type_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('evidence_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->unique()
                ], StaticMembers::getTableOptions());
        
        $this->insert('evidence_type', ['name' => 'Foto']);
        $this->insert('evidence_type', ['name' => 'Video']);
        $this->insert('evidence_type', ['name' => 'Audio']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('evidence_type');
    }

}
