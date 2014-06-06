<?php

/**
 * This is the model class for table "register_users".
 *
 * The followings are the available columns in table 'register_users':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $phone_num
 * @property string $grade
 * @property string $school
 * @property string $course
 * @property string $teacher_name
 * @property string $textbook
 * @property string $how_hear
 * @property integer $package_id
 * @property string $payment_status
 * @property string $payment_date
 *
 * The followings are the available model relations:
 * @property PaymentPackage $package
 */
class RegisterUsers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RegisterUsers the static model class
	 */
     public $confirm_password;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'register_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password, phone_num, grade, school, course, package_id', 'required'),
			array('package_id', 'numerical', 'integerOnly'=>true),
			array('name, email, password, school, course, teacher_name, textbook', 'length', 'max'=>225),
			array('phone_num', 'length', 'max'=>25),
			array('grade', 'length', 'max'=>50),
			array('payment_status', 'length', 'max'=>9),
			array('how_hear, payment_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, password, phone_num, grade, school, course, teacher_name, textbook, how_hear, package_id, payment_status, payment_date', 'safe', 'on'=>'search'),
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
			'package' => array(self::BELONGS_TO, 'PaymentPackage', 'package_id'),
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
			'password' => 'Password',
			'phone_num' => 'Phone Num',
			'grade' => 'Grade',
			'school' => 'School',
			'course' => 'Course',
			'teacher_name' => 'Teacher Name',
			'textbook' => 'Textbook',
			'how_hear' => 'How Hear',
			'package_id' => 'Package',
			'payment_status' => 'Payment Status',
			'payment_date' => 'Payment Date',
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
		$criteria->compare('password',$this->password,true);
		$criteria->compare('phone_num',$this->phone_num,true);
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('course',$this->course,true);
		$criteria->compare('teacher_name',$this->teacher_name,true);
		$criteria->compare('textbook',$this->textbook,true);
		$criteria->compare('how_hear',$this->how_hear,true);
		$criteria->compare('package_id',$this->package_id);
		$criteria->compare('payment_status',$this->payment_status,true);
		$criteria->compare('payment_date',$this->payment_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}