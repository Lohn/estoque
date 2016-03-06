<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produto;

/**
 * ProdutoSearch represents the model behind the search form about `app\models\Produto`.
 */
class ProdutoSearch extends Produto
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nome', 'descricao'], 'safe'],
            [['preco'], 'number'],
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
        $query = Produto::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['nome'] = [
            'asc' => ['nome' => SORT_ASC],
            'desc' => ['nome' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['descricao'] = [
            'asc' => ['descricao' => SORT_ASC],
            'desc' => ['descricao' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'nome', $this->search])
        ->orFilterWhere(['like', 'descricao', $this->search]);

        return $dataProvider;
    }
}
