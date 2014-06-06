<?php

/**
 * This is the model class for table "practice_exam_request".
 *
 * The followings are the available columns in table 'practice_exam_request':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone_num
 * @property string $grade
 * @property string $school
 * @property string $course
 * @property string $exam_type
 * @property string $exam_date
 * @property string $exam_topics
 * @property string $charge
 * @property integer $is_payed
 * @property integer $is_register_user
 * @property string $request_date
 */
class PracticeExamRequest extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PracticeExamRequest the static model class
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
		return 'practice_exam_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, grade, course, exam_date, exam_topics, charge, request_date', 'required'),
			array('is_payed, is_register_user', 'numerical', 'integerOnly'=>true),
			array('name, email, school, course', 'length', 'max'=>225),
			array('phone_num', 'length', 'max'=>15),
			array('grade', 'length', 'max'=>50),
			array('exam_type', 'length', 'max'=>7),
			array('charge', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, phone_num, grade, school, course, exam_type, exam_date, exam_topics, charge, is_payed, is_register_user, request_date', 'safe', 'on'=>'search'),
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
			'course' => 'Course',
			'exam_type' => 'Exam Type',
			'exam_date' => 'Exam Date',
			'exam_topics' => 'Exam Topics',
			'charge' => 'Charge',
			'is_payed' => 'Is Payed',
			'is_register_user' => 'Is Register User',
			'request_date' => 'Request Date',
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
		$criteria->compare('course',$this->course,true);
		$criteria->compare('exam_type',$this->exam_type,true);
		$criteria->compare('exam_date',$this->exam_date,true);
		$criteria->compare('exam_topics',$this->exam_topics,true);
		$criteria->compare('charge',$this->charge,true);
		$criteria->compare('is_payed',$this->is_payed);
		$criteria->compare('is_register_user',$this->is_register_user);
		$criteria->compare('request_date',$this->request_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}