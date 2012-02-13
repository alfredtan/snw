<?php

/**
 * This is the model class for table "app_user".
 *
 * The followings are the available columns in table 'app_user':
 * @property string $fbid
 * @property string $name
 * @property string $email
 * @property string $dateEntry
 * @property string $dateRegistered
 *
 * The followings are the available model relations:
 * @property RelUserQuestionAnswer[] $relUserQuestionAnswers
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'app_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fbid,name,email', 'required'),
			array('email','email'),
			array('fbid', 'length', 'max'=>20),
			array('name, email', 'length', 'max'=>100),
			array('dateEntry','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
      array('dateRegistered','default',
            'value'=>new CDbExpression('NOW()'),
            'setOnEmpty'=>false,'on'=>'insert'),
			array('dateEntry, dateRegistered', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fbid, name, email, dateEntry, dateRegistered', 'safe', 'on'=>'search'),
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
			'relUserQuestionAnswers' => array(self::HAS_MANY, 'RelUserQuestionAnswer', 'fbid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fbid' => 'Fbid',
			'name' => 'Name',
			'email' => 'Email',
			'dateEntry' => 'Date Entry',
			'dateRegistered' => 'Date Registered',
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

		$criteria->compare('fbid',$this->fbid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('dateEntry',$this->dateEntry,true);
		$criteria->compare('dateRegistered',$this->dateRegistered,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}