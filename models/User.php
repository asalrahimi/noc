<?php

namespace app\models;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
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
<<<<<<< HEAD
=======
=======
use yii\db\ActiveRecord;

class User extends ActiveRecord
{

        /**
     * @return array the validation rules.
>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
            [['name', 'family', 'address', 'phone'], 'required'],
            [['name', 'family'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 200],        ];
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
<<<<<<< HEAD
=======
=======
            // username and password are both required
            [['name', 'family','address'], 'required'],
        ];
    }

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
}
