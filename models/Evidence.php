<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evidence".
 *
 * @property int $id
 * @property int $event_id
 * @property int $type_id
 * @property string $file
 *
 * @property Event $event
 * @property EvidenceType $type
 */
class Evidence extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'evidence';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'type_id', 'file'], 'required'],
            [['event_id', 'type_id'], 'integer'],
            [['file'], 'string', 'max' => 250],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EvidenceType::className(), 'targetAttribute' => ['type_id' => 'id']],
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
            'type_id' => 'Type ID',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(EvidenceType::className(), ['id' => 'type_id']);
    }
}
