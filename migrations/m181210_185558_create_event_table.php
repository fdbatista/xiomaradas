<?php

use app\classes\StaticMembers;
use yii\db\Migration;

/**
 * Handles the creation of table `event`.
 */
class m181210_185558_create_event_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('event', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'description' => $this->text()->notNull(),
                ], StaticMembers::getTableOptions());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('event');
    }

}
