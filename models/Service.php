<?php

namespace app\models;

<<<<<<< HEAD
use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $max_use_no
 * @property string $pop_or_point
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
=======
use yii\db\ActiveRecord;

class Service extends ActiveRecord
{

        /**
     * @return array the validation rules.
>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            [['name', 'type', 'max_use_no', 'pop_or_point'], 'required'],
            [['max_use_no'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 20],
            [['pop_or_point'], 'string', 'max' => 50],
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
            'pop_or_point' => 'Pop Or Point',
        ];
    }
=======
            [['name', 'type','max_use_no','pop_or_point'],'required' ],
        ];
    }

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
}
