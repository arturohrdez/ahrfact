<?php

namespace app\models;

use Yii;
use app\models\Clientes;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
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
 * @property int $cliente_id
 * @property int $tipo
 *
 * @property Clientes $cliente
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
            [['razon_social', 'rfc', 'calle', 'codigo_postal', 'colonia', 'municipio', 'estado', 'pais', 'regimen_fiscal', 'cliente_id'], 'required'],
            ['rfc', 'match', 'pattern' => '/^[A-Z]{3,4}[0-9]{6}[A-Z0-9]{3}$/', 'message' => 'RFC no válido.'],
            ['cliente_id', 'integer'],
            [['razon_social', 'nombre', 'calle', 'colonia', 'municipio', 'estado', 'pais', 'referencia', 'regimen_fiscal'], 'string', 'max' => 255],
            [['tipo'], 'string', 'max' => 10],
            [['rfc'], 'string', 'max' => 15],
            [['curp'], 'string', 'max' => 20],
            [['no_exterior'], 'string', 'max' => 45],
            ['curp', 'match', 'pattern' => '/^[A-Z]{4}\d{6}[HM][A-Z]{5}\d{2}$/', 'message' => 'CURP no válida.'],
            [['no_interior','localidad'], 'string', 'max' => 100],
            [['codigo_postal'], 'number'],
            [['codigo_postal'], 'string', 'length'=>5],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['cliente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'             => 'ID',
            'razon_social'   => 'Razon Social',
            'nombre'         => 'Nombre',
            'RFC'            => 'Rfc',
            'CURP'           => 'Curp',
            'calle'          => 'Calle',
            'no_exterior'    => 'No Exterior',
            'no_interior'    => 'No Interior',
            'codigo_postal'  => 'Codigo Postal',
            'colonia'        => 'Colonia',
            'localidad'      => 'Localidad',
            'municipio'      => 'Municipio',
            'estado'         => 'Estado',
            'pais'           => 'Pais',
            'referencia'     => 'Referencia',
            'regimen_fiscal' => 'Regimen Fiscal',
            'cliente_id'     => 'Cliente ID',
            'tipo'           => 'Tipo',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::class, ['id' => 'cliente_id']);
    }
}
