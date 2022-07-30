<?php

namespace app\models;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
use Yii;

/**
 * This is the model class for table "pop".
 *
 * @property int $id
 * @property string $name
 * @property string $address
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
<<<<<<< HEAD
=======
=======
use yii\db\ActiveRecord;

class Pop extends ActiveRecord
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
            [['name', 'type', 'max_use_no','address'], 'required'],
            [['max_use_no'], 'integer','min' =>0],
=======
<<<<<<< HEAD
            [['name', 'type', 'max_use_no'], 'required'],
            [['max_use_no'], 'integer'],
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
            [['name'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 200],
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
            'address' => 'Address',
            'type' => 'Type',
            'max_use_no' => 'Max Use No',
        ];
    }
<<<<<<< HEAD
=======
=======
            [['name', 'type','max_use_no'], 'required'],
        ];
    }

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
}
