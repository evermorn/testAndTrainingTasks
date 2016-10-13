<?php
namespace app\commands;

use Yii;
use app\models\PropertiesConvert;
use yii\console\Controller;

class PropertiesConvertController extends Controller
{
	public function actionIndex( $name ) {
		
		$model = new PropertiesConvert();
		
		$xmlObj = simplexml_load_file( $name );
		foreach( $xmlObj->result->ROWSET->ROW as $ROW ) {
			if( strtotime( (string)$ROW->ACTIVE_TO ) >= time() )  {
				$model->plan_id = (int)$ROW->PLAN_ID; $model->markAttributeDirty( 'plan_id' );
				$model->property_id = (int)$ROW->PROPERTY_ID; $model->markAttributeDirty( 'property_id' );
				$model->property_type_id = (int)$ROW->PROPERTY_TYPE_ID; $model->markAttributeDirty( 'property_type_id' );
				$model->active_from = (string)$ROW->ACTIVE_FROM; $model->markAttributeDirty( 'active_from' );
				$model->active_to = (string)$ROW->ACTIVE_TO; $model->markAttributeDirty( 'active_to' );
				$model->prop_value = (int)$ROW->PROP_VALUE; $model->markAttributeDirty( 'prop_value' );
				$model->insert();
			}
		}
	}
}