<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserved_service".
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_name
 * @property string $user_family
 * @property string $user_address
 * @property int $service_id
 * @property string $service_name
 * @property string $service_type
 * @property int $pop_id
 * @property string $pop_name
 * @property string $pop_type
 */
class Reserved extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserved_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'user_name', 'user_family', 'user_address', 'service_id', 'service_name', 'service_type', 'pop_id', 'pop_name', 'pop_type'], 'required'],
            [['user_id', 'service_id', 'pop_id'], 'integer'],
            [['user_name', 'user_family'], 'string', 'max' => 50],
            [['user_address', 'service_name', 'pop_name', 'pop_type'], 'string', 'max' => 100],
            [['service_type'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'user_family' => 'User Family',
            'user_address' => 'User Address',
            'service_id' => 'Service ID',
            'service_name' => 'Service Name',
            'service_type' => 'Service Type',
            'pop_id' => 'Pop ID',
            'pop_name' => 'Pop Name',
            'pop_type' => 'Pop Type',
        ];
    }
}
