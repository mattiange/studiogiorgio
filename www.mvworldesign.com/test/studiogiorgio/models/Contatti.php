<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%contatti}}".
 *
 * @property int $idContatto
 * @property string $voce
 * @property string $visualizzare
 * @property string $icona
 * @property string $campo
 * @property string $callToAction
 */
class Contatti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%contatti}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['voce', 'campo'], 'required'],
            [['visualizzare', 'callToAction'], 'string'],
            [['voce'], 'string', 'max' => 100],
            [['icona'], 'string', 'max' => 255],
            [['campo'], 'string', 'max' => 50],
            [['voce'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idContatto' => Yii::t('app', 'Id Contatto'),
            'voce' => Yii::t('app', 'Voce'),
            'visualizzare' => Yii::t('app', 'Visualizzare'),
            'icona' => Yii::t('app', 'Icona'),
            'campo' => Yii::t('app', 'Campo'),
            'callToAction' => Yii::t('app', 'Call To Action'),
        ];
    }
    
    /**
     * 
     * @return type
     */
    public static function getContacts(){
        return Contatti::find()->where(['visualizzare'=>'yes'])->asArray()->all();
    }
}
