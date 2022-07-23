<?php

namespace app\models;

use yii\db\ActiveRecord;

class Pop extends ActiveRecord
{

        /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'type','max_use_no'], 'required'],
        ];
    }

}
