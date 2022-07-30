<?php

namespace app\models;

use GuzzleHttp\Psr7\Query;
use Yii;

/**
 * This is the model class for table "reserved_service".
 *
 * @property int $id
 * @property int $user_id
 * @property string $user_name
 * @property string $user_family
 * @property string $user_address
 * @property int $service_id
 * @property string $service_name
 * @property int $pop_id
 * @property string $pop_name
 * @property string $pop_type
 */
class Reserved extends \yii\db\ActiveRecord
{
    public $user_name;
    public $user_family;
    public $user_address;
    public $service_name;
    public $pop_name;
    public $pop_type;

    public  function afterFind()
    {
            parent::afterFind();
    
        $user=User::find()->where(['id'=>$this->user_id])->one();
        $this->user_name=$user['name'];
        $this->user_family=$user['family'];
        $this->user_address=$user['address'];

        $service=Service::find()->where(['id'=>$this->service_id])->one();
        $this->service_name=$service['name'];

        $pop=Pop::find()->where(['id'=>$this->pop_id])->one();
        $this->pop_name=$pop['name'];
        $this->pop_type=$pop['type'];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserved_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','service_id', 'pop_id',], 'required'],
            [['user_id', 'service_id', 'pop_id'], 'integer','min' =>0],
            [['user_name','user_family','user_address',
            'service_name','pop_name','pop_type'], 'safe',]

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'service_id' => 'Service ID',
            'pop_id' => 'Pop ID',
            'user_name'=>'UserName',
            'user_family'=>'User Family',
            'user_address'=>'User Address',
            'service_name'=>'Service Name',
            'pop_name'=>'Pop Name',
            'pop_type'=>'Pop Type',
        ];
    }
}
