<?php

use yii\db\Migration;

/**
 * Handles the creation of table `event_category`.
 */
class m181210_190616_create_event_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('event_category', [
            'id' => $this->primaryKey(),
            'event_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);
        
        $this->addForeignKey('fk_eventcategory_event', 'event_category', 'event_id', 'event', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_eventcategory_cat', 'event_category', 'category_id', 'category', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('event_category');
    }
}
