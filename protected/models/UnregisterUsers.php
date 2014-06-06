<?php

/**
 * This is the model class for table "unregister_users".
 *
 * The followings are the available columns in table 'unregister_users':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone_num
 * @property string $grade
 * @property string $school
 * @property string $payment_status
 */
class UnregisterUsers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UnregisterUsers the static model class
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
		return 'unregister_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, phone_num, grade, school', 'required'),
			array('name, email, phone_num, school', 'length', 'max'=>225),
			array('grade', 'length', 'max'=>15),
			array('payment_status', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, phone_num, grade, school, payment_status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'email' => 'Email',
			'phone_num' => 'Phone Num',
			'grade' => 'Grade',
			'school' => 'School',
			'payment_status' => 'Payment Status',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone_num',$this->phone_num,true);
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('payment_status',$this->payment_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}