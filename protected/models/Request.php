<?php

/**
 * This is the model class for table "app_request".
 *
 * The followings are the available columns in table 'app_request':
 * @property string $requestId
 * @property string $toFbid
 * @property string $fromFbid
 * @property string $requestDate
 * @property string $acceptDate
 *
 * The followings are the available model relations:
 * @property User $fromFb
 */
class Request extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Request the static model class
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
		return 'app_request';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('requestId, toFbid, fromFbid', 'required'),
			array('requestDate','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			array('requestId, toFbid, fromFbid', 'length', 'max'=>20),
			array('acceptDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('requestId, toFbid, fromFbid, requestDate, acceptDate', 'safe', 'on'=>'search'),
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
			'fromFb' => array(self::BELONGS_TO, 'User', 'fromFbid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'requestId' => 'Request',
			'toFbid' => 'To Fbid',
			'fromFbid' => 'From Fbid',
			'requestDate' => 'Request Date',
			'acceptDate' => 'Accept Date',
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

		$criteria->compare('requestId',$this->requestId,true);
		$criteria->compare('toFbid',$this->toFbid,true);
		$criteria->compare('fromFbid',$this->fromFbid,true);
		$criteria->compare('requestDate',$this->requestDate,true);
		$criteria->compare('acceptDate',$this->acceptDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}