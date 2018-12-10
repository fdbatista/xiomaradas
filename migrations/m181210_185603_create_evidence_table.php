<?php

use app\classes\StaticMembers;
use yii\db\Migration;

/**
 * Handles the creation of table `event_evidence`.
 */
class m181210_185603_create_evidence_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('evidence', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'file' => $this->string(250)->notNull(),
                ], StaticMembers::getTableOptions());

        $this->addForeignKey('fk_evidence_event', 'evidence', 'event_id', 'event', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_evidence_type', 'evidence', 'type_id', 'evidence_type', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('evidence');
    }

}
