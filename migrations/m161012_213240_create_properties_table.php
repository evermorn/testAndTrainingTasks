<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation for table `properties`.
 */
class m161012_213240_create_properties_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('properties', [
            'id' => Schema::TYPE_PK,
			'plan_id' => Schema::TYPE_INTEGER . ' UNSIGNED NOT NULL',
            'property_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'property_type_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'active_from' => Schema::TYPE_STRING,
			'active_to' => Schema::TYPE_STRING,
			'prop_value' => Schema::TYPE_INTEGER,
        ], $tableOptions);
        
		$this->createIndex('fk_properties_plans_id', 'properties', 'plan_id');
        $this->addForeignKey( 'fk_properties_plans_id', 'properties', 'plan_id', 'plans', 'id', 'CASCADE' );
	}
	public function down()
    {
        $this->dropTable('properties');
    }
}
