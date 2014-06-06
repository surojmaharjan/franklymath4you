<?php

/**
 * This is the model class for table "website_setting".
 *
 * The followings are the available columns in table 'website_setting':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $paypal_username
 * @property string $paypal_password
 * @property string $paypal_signature
 * @property integer $apiLive
 * @property string $google_analytic
 */
class WebsiteSetting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return WebsiteSetting the static model class
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
		return 'website_setting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, paypal_username, paypal_password, paypal_signature', 'required'),
			array('apiLive', 'numerical', 'integerOnly'=>true),
			array('name, email, paypal_username, paypal_password, paypal_signature', 'length', 'max'=>225),
			array('google_analytic', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, email, paypal_username, paypal_password, paypal_signature, apiLive, google_analytic', 'safe', 'on'=>'search'),
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
			'paypal_username' => 'Paypal Username',
			'paypal_password' => 'Paypal Password',
			'paypal_signature' => 'Paypal Signature',
			'apiLive' => 'Api Live',
			'google_analytic' => 'Google Analytic',
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
		$criteria->compare('paypal_username',$this->paypal_username,true);
		$criteria->compare('paypal_password',$this->paypal_password,true);
		$criteria->compare('paypal_signature',$this->paypal_signature,true);
		$criteria->compare('apiLive',$this->apiLive);
		$criteria->compare('google_analytic',$this->google_analytic,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}