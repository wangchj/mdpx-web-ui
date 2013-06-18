<?php

/**
 * This is the model class for table "Measurements".
 *
 * The followings are the available columns in table 'Measurements':
 * @property string $measurementId
 * @property integer $experimentSetupId
 * @property string $dateTime
 * @property string $dcVoltage
 * @property string $dcCurrent
 * @property string $rfPower
 * @property string $massFlow
 * @property string $pressure
 * @property string $magnet1
 * @property string $magnet2
 * @property string $magnet3
 * @property string $magnet4
 * @property string $magneticField
 * @property string $magneticFieldGradient
 * @property string $dataPath
 *
 * The followings are the available model relations:
 * @property ExperimentSetups $experimentSetup
 */
class Measurements extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Measurements';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('measurementId, experimentSetupId, dateTime, dataPath', 'required'),
            array('experimentSetupId', 'numerical', 'integerOnly'=>true),
            array('measurementId', 'length', 'max'=>15),
            array('dcVoltage, dcCurrent, rfPower, massFlow, pressure, magnet1, magnet2, magnet3, magnet4, magneticField, magneticFieldGradient', 'length', 'max'=>18),
            array('dataPath', 'length', 'max'=>45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('measurementId, experimentSetupId, dateTime, dcVoltage, dcCurrent, rfPower, massFlow, pressure, magnet1, magnet2, magnet3, magnet4, magneticField, magneticFieldGradient, dataPath', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'experimentSetup' => array(self::BELONGS_TO, 'ExperimentSetups', 'experimentSetupId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'measurementId' => 'Measurement',
            'experimentSetupId' => 'Experiment Setup',
            'dateTime' => 'Date Time',
            'dcVoltage' => 'Dc Voltage',
            'dcCurrent' => 'Dc Current',
            'rfPower' => 'Rf Power',
            'massFlow' => 'Mass Flow',
            'pressure' => 'Pressure',
            'magnet1' => 'Magnet1',
            'magnet2' => 'Magnet2',
            'magnet3' => 'Magnet3',
            'magnet4' => 'Magnet4',
            'magneticField' => 'Magnetic Field',
            'magneticFieldGradient' => 'Magnetic Field Gradient',
            'dataPath' => 'Data Path',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('measurementId',$this->measurementId,true);
        $criteria->compare('experimentSetupId',$this->experimentSetupId);
        $criteria->compare('dateTime',$this->dateTime,true);
        $criteria->compare('dcVoltage',$this->dcVoltage,true);
        $criteria->compare('dcCurrent',$this->dcCurrent,true);
        $criteria->compare('rfPower',$this->rfPower,true);
        $criteria->compare('massFlow',$this->massFlow,true);
        $criteria->compare('pressure',$this->pressure,true);
        $criteria->compare('magnet1',$this->magnet1,true);
        $criteria->compare('magnet2',$this->magnet2,true);
        $criteria->compare('magnet3',$this->magnet3,true);
        $criteria->compare('magnet4',$this->magnet4,true);
        $criteria->compare('magneticField',$this->magneticField,true);
        $criteria->compare('magneticFieldGradient',$this->magneticFieldGradient,true);
        $criteria->compare('dataPath',$this->dataPath,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Measurements the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}