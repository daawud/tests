<?php

namespace app\modules\salesanalysis\controllers;

use app\modules\salesanalysis\models\Purchases;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `salesanalysis` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
		$query = Purchases::find()
				->select('user_id')
				->distinct()
				->joinWith('purchasePositions pp', false, 'RIGHT JOIN')
				->joinWith('purchasePositions.product prod', false)
				->where(['between', 'purchase_date','2020-01-01 11:00', '2020-02-16 12:00'])
				->andWhere(['or like', 'prod.sku', ['AAA', 'BBB', 'CCC']]);
	
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);
		
        return $this->render('index', [
		'dataProvider' => $dataProvider,
	]);
    }
}
