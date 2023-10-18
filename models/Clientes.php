<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidpPaterno
 * @property string $apellidoMaterno
 * @property string $email
 * @property string|null $telefono
 *
 * @property Empresa[] $empresas
 * @property User[] $users
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidpPaterno', 'apellidoMaterno', 'email'], 'required'],
            [['nombre'], 'string', 'max' => 150],
            [['apellidpPaterno', 'apellidoMaterno'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['email'], 'string', 'max' => 255],
            [['telefono'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'              => 'ID',
            'nombre'          => 'Nombre(s)',
            'apellidpPaterno' => 'Apellido Paterno',
            'apellidoMaterno' => 'Apellido Materno',
            'email'           => 'Email',
            'telefono'        => 'Teléfono',
        ];
    }

    /**
     * Gets query for [[Empresas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::class, ['cliente_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['cliente_id' => 'id']);
    }
}
