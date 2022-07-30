<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $family
 * @property string $address
 * @property string $phone
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'family', 'address', 'phone'], 'required'],
            [['name', 'family'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 200],
            [['phone'], 'match', 'pattern' => '^(0|0098|\+98)9(0[1-5]|[1 3]\d|2[0-2]|98)\d{7}$^'],
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
            'family' => 'Family',
            'address' => 'Address',
            'phone' => 'Phone',
        ];
    }
}
