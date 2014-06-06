<?php

/**
 * This is the model class for table "setting".
 *
 * The followings are the available columns in table 'setting':
 * @property integer $id
 * @property string $apiUsername
 * @property string $apiPassword
 * @property string $apiSignature
 * @property integer $apiLive
 * @property string $scripts
 */
class Setting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Setting the static model class
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
		return 'setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('apiUsername, apiPassword, apiSignature', 'required'),
			array('apiLive', 'numerical', 'integerOnly'=>true),
			array('apiUsername, apiPassword, apiSignature', 'length', 'max'=>225),
			array('scripts', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, apiUsername, apiPassword, apiSignature, apiLive, scripts', 'safe', 'on'=>'search'),
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
			'apiUsername' => 'Api Username',
			'apiPassword' => 'Api Password',
			'apiSignature' => 'Api Signature',
			'apiLive' => 'Api Live',
			'scripts' => 'Scripts',
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
		$criteria->compare('apiUsername',$this->apiUsername,true);
		$criteria->compare('apiPassword',$this->apiPassword,true);
		$criteria->compare('apiSignature',$this->apiSignature,true);
		$criteria->compare('apiLive',$this->apiLive);
		$criteria->compare('scripts',$this->scripts,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}