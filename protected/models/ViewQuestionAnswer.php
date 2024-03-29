<?php

/**
 * This is the model class for table "view_question_answer".
 *
 * The followings are the available columns in table 'view_question_answer':
 * @property integer $questionId
 * @property string $question
 * @property integer $answerId
 * @property string $answer
 * @property integer $correct
 */
class ViewQuestionAnswer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ViewQuestionAnswer the static model class
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
		return 'view_question_answer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('answer', 'required'),
			array('questionId, answerId, correct', 'numerical', 'integerOnly'=>true),
			array('question', 'length', 'max'=>250),
			array('answer', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('questionId, question, answerId, answer, correct', 'safe', 'on'=>'search'),
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
			'questionId' => 'Question',
			'question' => 'Question',
			'answerId' => 'Answer',
			'answer' => 'Answer',
			'correct' => 'Correct',
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

		$criteria->compare('questionId',$this->questionId);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answerId',$this->answerId);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('correct',$this->correct);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}