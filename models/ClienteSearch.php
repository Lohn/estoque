<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form about `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nome', 'email', 'telefone'], 'safe'],
            [['search'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Cliente::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nome'] = [
            'asc' => ['nome' => SORT_ASC],
            'desc' => ['nome' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['email'] = [
            'asc' => ['email' => SORT_ASC],
            'desc' => ['email' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'nome', $this->search])
        ->orFilterWhere(['like', 'email', $this->search]);

        return $dataProvider;
    }
}
