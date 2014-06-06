<?php

/**
 * This is the model class for table "payment_package".
 *
 * The followings are the available columns in table 'payment_package':
 * @property integer $id
 * @property string $package_name
 * @property integer $month_duration
 * @property string $charge
 * @property string $short_note
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property RegisterUsers[] $registerUsers
 */
class PaymentPackage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PaymentPackage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment_package';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('package_name, month_duration, charge', 'required'),
			array('month_duration, is_active', 'numerical', 'integerOnly'=>true),
			array('package_name, short_note', 'length', 'max'=>225),
			array('charge', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, package_name, month_duration, charge, short_note, is_active', 'safe', 'on'=>'search'),
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
			'registerUsers' => array(self::HAS_MANY, 'RegisterUsers', 'package_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'package_name' => 'Package Name',
			'month_duration' => 'Month Duration',
			'charge' => 'Charge',
			'short_note' => 'Short Note',
			'is_active' => 'Is Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('package_name',$this->package_name,true);
		$criteria->compare('month_duration',$this->month_duration);
		$criteria->compare('charge',$this->charge,true);
		$criteria->compare('short_note',$this->short_note,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}