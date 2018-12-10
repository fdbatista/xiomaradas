<?php

namespace app\classes;

use Yii;

class StaticMembers {
    public static function getTableOptions() {
        return (Yii::$app->db->driverName === 'mysql') ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB' : null;
    }
}
