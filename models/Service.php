<?php

namespace app\models;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
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
    public function duplicateService($pops,$name)
    {
        $duplicate = false;
        $services=ArrayHelper::map(
        ServicePop::find()
        ->innerJoin('service','service_pop.service_id=service.id')
        ->where(['service.name'=>$name])
        ->all(),
        '',
        'id'
        );
        foreach ($pops as $pop) {
            if (ServicePop::find()->where(['and',['pop_id' => (int)$pop],['id' => $services]])->one()) {
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
<<<<<<< HEAD
=======
=======
use yii\db\ActiveRecord;

class Service extends ActiveRecord
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
            [['name', 'max_use_no', 'popOrPoint'], 'required'],
            [['max_use_no'], 'integer', 'min' => 0],
=======
<<<<<<< HEAD
            [['name', 'type', 'max_use_no', 'pop_or_point'], 'required'],
            [['max_use_no'], 'integer'],
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
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
<<<<<<< HEAD
=======
=======
            [['name', 'type','max_use_no','pop_or_point'],'required' ],
        ];
    }

>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
}
