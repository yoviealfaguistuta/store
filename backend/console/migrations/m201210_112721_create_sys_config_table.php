<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sys_config}}`.
 */
class m201210_112721_create_sys_config_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sys_config}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sys_config}}');
    }
}
