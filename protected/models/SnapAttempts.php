<?php

/**
 * This is the model class for table "app_snap_attempts".
 *
 * The followings are the available columns in table 'app_snap_attempts':
 * @property string $id
 * @property string $fbid
 * @property string $picture1
 * @property string $picture2
 * @property string $picture3
 * @property string $picture4
 * @property string $status
 * @property string $attemptDate
 */
class SnapAttempts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SnapAttempts the static model class
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
		return 'app_snap_attempts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fbid, status', 'required'),
			array('fbid', 'length', 'max'=>20),
			array('attemptDate','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			array('picture1, picture2, picture3, picture4', 'length', 'max'=>250),
			array('status', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fbid, picture1, picture2, picture3, picture4, status, attemptDate', 'safe', 'on'=>'search'),
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
			'fbid' => 'Fbid',
			'picture1' => 'Picture1',
			'picture2' => 'Picture2',
			'picture3' => 'Picture3',
			'picture4' => 'Picture4',
			'status' => 'Status',
			'attemptDate' => 'Attempt Date',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('fbid',$this->fbid,true);
		$criteria->compare('picture1',$this->picture1,true);
		$criteria->compare('picture2',$this->picture2,true);
		$criteria->compare('picture3',$this->picture3,true);
		$criteria->compare('picture4',$this->picture4,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('attemptDate',$this->attemptDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}