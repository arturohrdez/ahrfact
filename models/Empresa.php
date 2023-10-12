<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
 * @property int $user_id
 * @property string $razon_social
 * @property string|null $nombre
 * @property string $rfc
 * @property string|null $curp
 * @property string $calle
 * @property int $no_exterior
 * @property string|null $no_interior
 * @property string $codigo_postal
 * @property string $colonia
 * @property string $localidad
 * @property string $municipio
 * @property string $estado
 * @property string $pais
 * @property string|null $referencia
 * @property string $regimen_fiscal
 *
 * @property User $user
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'razon_social', 'rfc', 'calle', 'no_exterior', 'codigo_postal', 'colonia', 'localidad', 'municipio', 'estado', 'pais', 'regimen_fiscal'], 'required'],
            [['user_id', 'no_exterior'], 'integer'],
            [['razon_social', 'nombre', 'calle', 'colonia', 'localidad', 'municipio', 'estado', 'pais', 'referencia', 'regimen_fiscal'], 'string', 'max' => 255],
            [['rfc'], 'string', 'max' => 15],
            [['curp'], 'string', 'max' => 20],
            [['no_interior'], 'string', 'max' => 100],
            [['codigo_postal'], 'string', 'max' => 5],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'razon_social' => 'Razon Social',
            'nombre' => 'Nombre',
            'rfc' => 'Rfc',
            'curp' => 'Curp',
            'calle' => 'Calle',
            'no_exterior' => 'No Exterior',
            'no_interior' => 'No Interior',
            'codigo_postal' => 'Codigo Postal',
            'colonia' => 'Colonia',
            'localidad' => 'Localidad',
            'municipio' => 'Municipio',
            'estado' => 'Estado',
            'pais' => 'Pais',
            'referencia' => 'Referencia',
            'regimen_fiscal' => 'Regimen Fiscal',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
