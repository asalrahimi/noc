<?php

namespace app\models;

<<<<<<< HEAD
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
=======
use yii\db\ActiveRecord;

class Pop extends ActiveRecord
{

        /**
     * @return array the validation rules.
>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
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
=======
            [['name', 'type','max_use_no'], 'required'],
        ];
    }

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
}
