<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%weather}}`.
 */
class m211021_125411_create_weather_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%weather}}', [
            'id' => $this->primaryKey(),
            'data' => $this->string(200),
            'degrees' => $this->string(200)
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%weather}}');
    }
}
