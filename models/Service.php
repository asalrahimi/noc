<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string $name
 * @property int $max_use_no
 * @property string $popOrPoint
 */
class Service extends \yii\db\ActiveRecord
{

    protected $popOrPoint;

    public function __set($name, $value)

    {

        $setter = 'set' . $name;

        if (property_exists($this, $name) && method_exists($this, $setter))

            return $this->$setter($value);

        else parent::__set($name, $value);
    }


    public function __get($name)

    {

        $getter = 'get' . $name;

        if (property_exists($this, $name) && method_exists($this, $getter))

            return $this->$getter();

        else return parent::__get($name);
    }


    // function for set popOrPoint property
    public function setPopOrPoint($data)
    {
        $this->popOrPoint = $data;
    }

    //function for set popOrPoint value from pop table 
    public function getPopOrPoint()
    {
        if (($this->id !== '') && ($this->id !== null)) {
            $names = '';
            $pops = Pop::findBySql(
                "
        select * from pop inner join service_pop on pop.id=service_pop.pop_id where service_pop.service_id=$this->id"
            )
                ->asArray()
                ->all();


            foreach ($pops as $pop) {
                $names .= $pop['name'] . ' , ';
            }
            $names = trim($names, ' , ');
            $this->setPopOrPoint($names);
        }
        return $this->popOrPoint;
    }

    // function for check duplicate records
    public function duplicateService($pops)
    {
        $duplicate = false;

        foreach ($pops as $pop) {
            if (ServicePop::find()->where(['and',['pop_id' => (int)$pop],['service_id' => $this->id]])->one()) {
                return  $duplicate = true;

            }
        }
        return $duplicate;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'max_use_no', 'popOrPoint'], 'required'],
            [['max_use_no'], 'integer', 'min' => 0],
            [['name'], 'string', 'max' => 100],
            [['popOrPoint', 'name'], 'safe']
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
            'max_use_no' => 'Max Use No',
            'popOrPoint' => 'Pop_Point',
        ];
    }
}
