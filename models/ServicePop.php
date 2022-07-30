<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "service_pop".
 *
 * @property int $id
 * @property int $pop_id
 * @property int $service_id
 */
class ServicePop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service_pop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pop_id', 'service_id'], 'required'],
            [['pop_id', 'service_id'], 'integer','min' =>0],
        ];
    }

}
