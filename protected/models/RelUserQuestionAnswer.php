<?php

/**
 * This is the model class for table "app_rel_user_question_answer".
 *
 * The followings are the available columns in table 'app_rel_user_question_answer':
 * @property string $fbid
 * @property integer $questionId
 * @property integer $answerId
 *
 * The followings are the available model relations:
 * @property Question $question
 * @property Answer $answer
 * @property User $fb
 */
class RelUserQuestionAnswer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelUserQuestionAnswer the static model class
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
		return 'app_rel_user_question_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fbid, questionId, answerId', 'required'),
			array('questionId, answerId', 'numerical', 'integerOnly'=>true),
			array('fbid', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fbid, questionId, answerId', 'safe', 'on'=>'search'),
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
			'question' => array(self::BELONGS_TO, 'Question', 'questionId'),
			'answer' => array(self::BELONGS_TO, 'Answer', 'answerId'),
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
			'questionId' => 'Question',
			'answerId' => 'Answer',
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
		$criteria->compare('questionId',$this->questionId);
		$criteria->compare('answerId',$this->answerId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}