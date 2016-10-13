<?php
namespace app\commands;

use Yii;
use app\models\PlansConvert;
use yii\console\Controller;

class PlansConvertController extends Controller
{
	public function actionIndex( $name ) {
		
		$model = new PlansConvert();
		$xmlObj = simplexml_load_file( $name );
		foreach( $xmlObj->result->ROWSET->ROW as $ROW ) {
			if( strtotime( (string)$ROW->ACTIVE_TO ) >= time() )  {
				$model->id = (int)$ROW->PLAN_ID; $model->markAttributeDirty( 'id' );
				$model->plan_name = (string)$ROW->PLAN_NAME; $model->markAttributeDirty( 'plan_name' );
				$model->plan_group_id = (int)$ROW->PLAN_GROUP_ID; $model->markAttributeDirty( 'plan_group_id' );
				$model->active_from = (string)$ROW->ACTIVE_FROM; $model->markAttributeDirty( 'active_from' );
				$model->active_to = (string)$ROW->ACTIVE_TO; $model->markAttributeDirty( 'active_to' );
				$model->company_id = (string)$ROW->COMPANY_ID; $model->markAttributeDirty( 'company_id' );
				$model->insert();
			}
		}
	}
}