<?php 
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ExcelUploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $excelFile;

    public function rules()
    {
        return [
            ['excelFile', 'required'],
            [['excelFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx, xls'],
            [['excelFile'], 'file', 'maxSize' => 2 * 1024 * 1024], // Establece el límite en 2 MB
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'excelFile' => 'Archivo Excel (XLSX, XLS)',
        ];
    }
}
