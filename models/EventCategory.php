<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "event_category".
 *
 * @property int $id
 * @property int $event_id
 * @property int $category_id
 */
class EventCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'category_id'], 'required'],
            [['event_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'category_id' => 'Category ID',
        ];
    }
}
