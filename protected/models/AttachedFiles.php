<?php

/**
 * This is the model class for table "attached_files".
 *
 * The followings are the available columns in table 'attached_files':
 * @property integer $id
 * @property string $file_name
 * @property string $attach_for
 * @property integer $reference_id
 */
class AttachedFiles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AttachedFiles the static model class
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
		return 'attached_files';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reference_id', 'required'),
			array('reference_id', 'numerical', 'integerOnly'=>true),
			array('file_name', 'length', 'max'=>255),
			array('attach_for', 'length', 'max'=>12),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, file_name, attach_for, reference_id', 'safe', 'on'=>'search'),
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
			'file_name' => 'File Name',
			'attach_for' => 'Attach For',
			'reference_id' => 'Reference',
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
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('attach_for',$this->attach_for,true);
		$criteria->compare('reference_id',$this->reference_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}