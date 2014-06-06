<?php

/**
 * This is the model class for table "practrice_exams".
 *
 * The followings are the available columns in table 'practrice_exams':
 * @property integer $id
 * @property string $exam_type
 * @property string $charge
 * @property string $short_note
 */
class PractriceExams extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PractriceExams the static model class
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
		return 'practrice_exams';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('charge', 'required'),
			array('exam_type, short_note', 'length', 'max'=>255),
			array('charge', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, exam_type, charge, short_note', 'safe', 'on'=>'search'),
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
			'exam_type' => 'Exam Type',
			'charge' => 'Charge',
			'short_note' => 'Short Note',
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
		$criteria->compare('exam_type',$this->exam_type,true);
		$criteria->compare('charge',$this->charge,true);
		$criteria->compare('short_note',$this->short_note,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}