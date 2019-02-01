<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%categorie}}".
 *
 * @property integer $idCategoria
 * @property string $categoria
 * @property string $immagine
 * @property string $descrizione
 * @property string $immagine_categoria
 * @property string $intro_text
 *
 * @property Articoli[] $articolis
 */
class Categorie extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categorie}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descrizione'], 'string'],
            [['intro_text'], 'required'],
            [['categoria', 'immagine', 'immagine_categoria', 'intro_text'], 'string', 'max' => 255],
            //[['immagine'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCategoria' => Yii::t('app', 'Id Categoria'),
            'categoria' => Yii::t('app', 'Categoria'),
            'immagine' => Yii::t('app', 'Immagine'),
            'descrizione' => Yii::t('app', 'Descrizione'),
            'immagine_categoria' => Yii::t('app', 'Immagine Categoria'),
            'intro_text' => Yii::t('app', 'Intro Text'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticolis()
    {
        return $this->hasMany(Articoli::className(), ['categoria_id' => 'idCategoria']);
    }
}
