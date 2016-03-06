<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pedido;

/**
 * PedidoSearch represents the model behind the search form about `app\models\Pedido`.
 */
class PedidoSearch extends Pedido
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_cliente', 'id_produto'], 'integer'],
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
        $query = Pedido::find();

        $query->joinWith(['produto', 'cliente']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['produto'] = [
            'asc' => ['produto.nome' => SORT_ASC],
            'desc' => ['produto.nome' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['cliente'] = [
            'asc' => ['cliente.nome' => SORT_ASC],
            'desc' => ['cliente.nome' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'cliente.nome', $this->search])
        ->orFilterWhere(['like', 'produto.nome', $this->search]);

        return $dataProvider;
    }
}
