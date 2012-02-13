<?php

/**
 * This is the model class for table "app_user_friend".
 *
 * The followings are the available columns in table 'app_user_friend':
 * @property string $fbid
 * @property string $friendFbid
 * @property integer $eligible
 * @property string $friendDate
 *
 * The followings are the available model relations:
 * @property User $fb
 */
class UserFriend extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserFriend the static model class
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
		return 'app_user_friend';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fbid, friendFbid, eligible', 'required'),
			array('friendDate','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			array('eligible', 'numerical', 'integerOnly'=>true),
			array('fbid, friendFbid', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fbid, friendFbid, eligible, friendDate', 'safe', 'on'=>'search'),
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
			'fb' => array(self::BELONGS_TO, 'User', 'fbid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fbid' => 'Fbid',
			'friendFbid' => 'Friend Fbid',
			'eligible' => 'Eligible',
			'friendDate' => 'Friend Date',
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
		$criteria->compare('friendFbid',$this->friendFbid,true);
		$criteria->compare('eligible',$this->eligible);
		$criteria->compare('friendDate',$this->friendDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}