<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{

        /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'family','address'], 'required'],
        ];
    }

}
