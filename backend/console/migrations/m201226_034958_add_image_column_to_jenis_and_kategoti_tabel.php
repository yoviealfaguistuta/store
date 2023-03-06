<?php

use yii\db\Migration;

/**
 * Class m201226_034958_add_image_column_to_jenis_and_kategoti_tabel
 */
class m201226_034958_add_image_column_to_jenis_and_kategoti_tabel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mst_jenis_barang_image}}', [
            'id' => $this->integer()->notNull(),
            'image_type' => $this->string()->notNull(),
            'original' => $this->binary(429496729)->notNull(),
            'small' => $this->binary(429496729)->notNull(),
            'thumb' => $this->binary(429496729)->notNull(),
        ]);

        $this->addPrimaryKey('mst_jenis_barang_image_pkey', '{{%mst_jenis_barang_image}}', 'id');
        $this->addForeignKey('fk_mst_jenis_barang_image_jenis', '{{%mst_jenis_barang_image}}', 'id', '{{%mst_jenis_barang}}', 'id');

        $this->createTable('{{%mst_kategori_barang_image}}', [
            'id' => $this->integer()->notNull(),
            'image_type' => $this->string()->notNull(),
            'original' => $this->binary(429496729)->notNull(),
            'small' => $this->binary(429496729)->notNull(),
            'thumb' => $this->binary(429496729)->notNull(),
        ]);

        $this->addPrimaryKey('mst_kategori_barang_image_pkey', '{{%mst_kategori_barang_image}}', 'id');
        $this->addForeignKey('fk_mst_kategori_barang_image_jenis', '{{%mst_kategori_barang_image}}', 'id', '{{%mst_kategori_barang}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201226_034958_add_image_column_to_jenis_and_kategoti_tabel cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201226_034958_add_image_column_to_jenis_and_kategoti_tabel cannot be reverted.\n";

        return false;
    }
    */
}
