<?php

use app\classes\StaticMembers;
use yii\db\Migration;

class m130524_201442_init extends Migration {

    public function up() {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'role_id' => $this->integer()->notNull()->defaultValue(2),
        ], StaticMembers::getTableOptions());
        
        //Administrator
        $this->insert('user', [
            'username' => 'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash('a'),
            'password_reset_token' => Yii::$app->security->generateRandomString(),
            'role_id' => 1,
        ]);
        
        //User
        $this->insert('user', [
            'username' => 'user',
            'password_hash' => Yii::$app->security->generatePasswordHash('a'),
            'password_reset_token' => Yii::$app->security->generateRandomString(),
            'role_id' => 2,
        ]);
    }

    public function down() {
        $this->dropTable('user');
    }

}
