<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pop".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $max_use_no
 */
class Pop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'max_use_no'], 'required'],
            [['max_use_no'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'max_use_no' => 'Max Use No',
        ];
    }
}
