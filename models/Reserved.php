<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class Reserved extends ActiveRecord
{


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [[$this->fields()], 'required'],
        ];
    }


    public static function tableName()
    {
        return 'reserved_service';
    }
}
