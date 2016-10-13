<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation for table `plans`.
 */
class m161012_213057_create_plans_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('plans', [
            'id' => Schema::TYPE_INTEGER . ' UNSIGNED NOT NULL PRIMARY KEY',
			'plan_name' => Schema::TYPE_STRING . ' NOT NULL',
			'plan_group_id' => Schema::TYPE_INTEGER,
			'active_from' => Schema::TYPE_STRING,
			'active_to' => Schema::TYPE_STRING,
			'company_id' => Schema::TYPE_STRING,
        ], $tableOptions);
    }
    public function down()
    {
        $this->dropTable('plans');
    }
}
