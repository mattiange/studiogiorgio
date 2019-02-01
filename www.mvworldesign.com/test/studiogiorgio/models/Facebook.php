<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%facebook}}".
 *
 * @property int $id
 * @property string $code
 */
class Facebook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%facebook}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
        ];
    }
    
    /**
     * Return code
     * 
     * @return type
     */
    public static function getFacebookPage(){
        return Facebook::find()->where(['id'=>1])->asArray()->one()['code'];
    }
}
