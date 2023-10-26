<?php

namespace app\models;

use Yii;
use app\models\Clientes;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property int $cliente_id
 * @property string $razon_social
 * @property string|null $nombre_comercial
 * @property string $rfc
 * @property string $uso_cfdi
 * @property string $regimen_fiscal
 * @property string $forma_pago
 * @property string|null $comentarios
 * @property string $pais
 * @property string $estado
 * @property string $ciudad
 * @property string $municipio
 * @property string $codigo_postal
 * @property string $colonia
 * @property string $calle
 * @property string $no_exterior
 * @property string|null $no_interior
 * @property string|null $referencia
 *
 * @property Clientes $cliente
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_id', 'razon_social', 'rfc', 'uso_cfdi', 'regimen_fiscal', 'forma_pago', 'pais', 'estado', 'ciudad', 'municipio', 'codigo_postal', 'colonia', 'calle', 'no_exterior'], 'required'],
            ['rfc', 'match', 'pattern' => '/^[A-Z]{3,4}[0-9]{6}[A-Z0-9]{3}$/', 'message' => 'RFC no válido.'],
            [['cliente_id'], 'integer'],
            [['comentarios', 'referencia'], 'string'],
            [['razon_social'], 'string', 'max' => 125],
            [['nombre_comercial'], 'string', 'max' => 150],
            [['rfc'], 'string', 'max' => 13],
            [['uso_cfdi'], 'string', 'max' => 30],
            [['regimen_fiscal', 'forma_pago', 'pais'], 'string', 'max' => 80],
            [['estado', 'ciudad', 'municipio'], 'string', 'max' => 100],
            [['codigo_postal'], 'number'],
            [['codigo_postal'], 'string', 'length'=>5],
            [['colonia'], 'string', 'max' => 200],
            [['calle'], 'string', 'max' => 120],
            [['no_exterior', 'no_interior'], 'string', 'max' => 45],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['cliente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'               => 'ID',
            'cliente_id'       => 'Cliente ID',
            'razon_social'     => 'Razón Social',
            'nombre_comercial' => 'Nombre Comercial',
            'rfc'              => 'RFC',
            'uso_cfdi'         => 'Uso de CFDI',
            'regimen_fiscal'   => 'Regimen Fiscal',
            'forma_pago'       => 'Forma Pago',
            'comentarios'      => 'Comentarios',
            'pais'             => 'País',
            'estado'           => 'Estado',
            'ciudad'           => 'Ciudad',
            'municipio'        => 'Municipio',
            'codigo_postal'    => 'Codigo Postal',
            'colonia'          => 'Colonia',
            'calle'            => 'Calle',
            'no_exterior'      => 'No. Exterior',
            'no_interior'      => 'No. Interior',
            'referencia'       => 'Referencia',
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
