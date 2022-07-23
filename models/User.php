<?php

namespace app\models;

<<<<<<< HEAD
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
=======
use yii\db\ActiveRecord;

class User extends ActiveRecord
{

        /**
     * @return array the validation rules.
>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            [['name', 'family', 'address', 'phone'], 'required'],
            [['name', 'family'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 11],
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
=======
            // username and password are both required
            [['name', 'family','address'], 'required'],
        ];
    }

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
}
