<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%fidelityCard}}".
 *
 * @property int $id
 * @property string $testo
 * @property string $card_fronte
 * @property string $card_retro
 */
class FidelityCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%fidelityCard}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['testo'], 'required'],
            [['testo'], 'string'],
            [['card_fronte', 'card_retro'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'testo' => Yii::t('app', 'Testo'),
            'card_fronte' => Yii::t('app', 'Card Fronte'),
            'card_retro' => Yii::t('app', 'Card Retro'),
        ];
    }
}
