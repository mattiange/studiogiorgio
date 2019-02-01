<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%voceMenu}}".
 *
 * @property integer $idVoceMeu
 * @property string $voce
 * @property integer $menu_id
 *
 * @property Menu $menu
 */
class VoceMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%voceMenu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['voce', 'menu_id'], 'required'],
            [['menu_id'], 'integer'],
            [['voce'], 'string', 'max' => 50],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu_id' => 'idMenu']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idVoceMeu' => Yii::t('app', 'Id Voce Meu'),
            'voce' => Yii::t('app', 'Voce'),
            'menu_id' => Yii::t('app', 'Menu ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['idMenu' => 'menu_id']);
    }
}
