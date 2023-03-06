<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%email_outbox}}`.
 */
class m201108_093030_create_email_outbox_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%email_outbox}}', [
            'id' => $this->bigPrimaryKey(),
            'email' => $this->string()->notNull(),
            'subject' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'processed' => $this->boolean()->notNull()->defaultValue(false),
            'created_at' => $this->integer(),
            'processed_at' => $this->integer(),
        ]);

        $this->createIndex('email_outbox_indexes', '{{%email_outbox}}', 'processed');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%email_outbox}}');
    }
}
