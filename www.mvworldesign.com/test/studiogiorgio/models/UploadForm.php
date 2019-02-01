<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $immagine;


    /**
     * 
     * @return type
     */
    public function rules()
    {
         return [
            [['immagine'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg, gif'],
        ];
    }
    
    /**
     * Carica l'immagine di categoria
     * 
     * @return boolean
     */
    public function upload($path = "")
    {
        if ($this->validate()) {
            $this->immagine->saveAs('uploads/' . $path . $this->immagine->baseName . '.' . $this->immagine->extension);
            
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Genera automaticamente un nome per il file da caricare
     * 
     * @param type $size
     * @return type
     */
    public function generateFilename($size = 20){
        $key = '';
        $keys = array_merge(range(0, 9), range('a', 'z'));

        for ($i = 0; $i < $size; $i++) {
            $key .= $keys[array_rand($keys)];
        }
        
        return $key;
    }
}