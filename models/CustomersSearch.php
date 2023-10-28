<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customers;

/**
 * CustomersSearch represents the model behind the search form of `app\models\Customers`.
 */
class CustomersSearch extends Customers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cliente_id'], 'integer'],
            [['razon_social', 'nombre_comercial', 'rfc', 'uso_cfdi', 'regimen_fiscal', 'forma_pago', 'comentarios', 'pais', 'estado', 'ciudad', 'municipio', 'codigo_postal', 'colonia', 'calle', 'no_exterior', 'no_interior', 'referencia','estatus'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        //$query = Customers::find();
        $query = Customers::find()->andWhere(["<>","estatus","2"]);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cliente_id' => $this->cliente_id,
        ]);

        $query->andFilterWhere(['like', 'razon_social', $this->razon_social])
            ->andFilterWhere(['like', 'nombre_comercial', $this->nombre_comercial])
            ->andFilterWhere(['like', 'rfc', $this->rfc])
            ->andFilterWhere(['like', 'uso_cfdi', $this->uso_cfdi])
            ->andFilterWhere(['like', 'regimen_fiscal', $this->regimen_fiscal])
            ->andFilterWhere(['like', 'forma_pago', $this->forma_pago])
            ->andFilterWhere(['like', 'comentarios', $this->comentarios])
            ->andFilterWhere(['like', 'pais', $this->pais])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'ciudad', $this->ciudad])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'codigo_postal', $this->codigo_postal])
            ->andFilterWhere(['like', 'colonia', $this->colonia])
            ->andFilterWhere(['like', 'calle', $this->calle])
            ->andFilterWhere(['like', 'no_exterior', $this->no_exterior])
            ->andFilterWhere(['like', 'no_interior', $this->no_interior])
            ->andFilterWhere(['like', 'referencia', $this->referencia])
            ->andFilterWhere(['=', 'estatus', $this->estatus])
            ;

        return $dataProvider;
    }
}
