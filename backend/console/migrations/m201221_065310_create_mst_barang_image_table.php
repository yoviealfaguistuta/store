<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mst_barang_image}}`.
 */
class m201221_065310_create_mst_barang_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mst_barang_image}}', [
            'id' => $this->bigPrimaryKey(),
            'barang_id' => $this->bigInteger()->notNull(),
            'title' => $this->string()->notNull(),
            'image_type' => $this->string()->notNull(),
            'original' => $this->binary(429496729)->notNull(),
            'small' => $this->binary(429496729)->notNull(),
            'thumb' => $this->binary(429496729)->notNull(),
            'is_main' => $this->boolean()->notNull()->defaultValue(false),
        ]);

        $this->addForeignKey('fk_mst_barang_image_barang', '{{%mst_barang_image}}', 'barang_id', '{{%mst_barang}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mst_barang_image}}');
    }
}
