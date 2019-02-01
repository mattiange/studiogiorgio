<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%slideshow}}".
 *
 * @property integer $idSlideshow
 * @property string $immagine
 * @property integer $posizione
 */
class Slideshow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%slideshow}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['posizione'], 'integer'],
            [['immagine'], 'string', 'max' => 255],
            [['posizione'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSlideshow' => Yii::t('app', 'Id Slideshow'),
            'immagine' => Yii::t('app', 'Immagine'),
            'posizione' => Yii::t('app', 'Posizione'),
        ];
    }
}
