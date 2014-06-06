<?php

/**
 * This is the model class for table "homework_questions".
 *
 * The followings are the available columns in table 'homework_questions':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone_num
 * @property string $grade
 * @property string $course
 * @property string $school
 * @property string $question
 * @property integer $is_register_user
 * @property string $charge
 * @property integer $is_payed
 * @property string $how_know
 */
class HomeworkQuestions extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HomeworkQuestions the static model class
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
		return 'homework_questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, phone_num, grade, course, school, how_know', 'required'),
			array('is_register_user, is_payed', 'numerical', 'integerOnly'=>true),
			array('name, email, course, school', 'length', 'max'=>255),
			array('phone_num', 'length', 'max'=>15),
			array('grade', 'length', 'max'=>50),
			array('charge', 'length', 'max'=>10),
			array('how_know', 'length', 'max'=>13),
			array('question', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, phone_num, grade, course, school, question, is_register_user, charge, is_payed, how_know', 'safe', 'on'=>'search'),
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
			'course' => 'Course',
			'school' => 'School',
			'question' => 'Question',
			'is_register_user' => 'Is Register User',
			'charge' => 'Charge',
			'is_payed' => 'Is Payed',
			'how_know' => 'How Know',
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
		$criteria->compare('course',$this->course,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('is_register_user',$this->is_register_user);
		$criteria->compare('charge',$this->charge,true);
		$criteria->compare('is_payed',$this->is_payed);
		$criteria->compare('how_know',$this->how_know,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}