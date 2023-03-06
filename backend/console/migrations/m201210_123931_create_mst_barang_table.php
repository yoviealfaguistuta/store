<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mst_barang}}`.
 */
class m201210_123931_create_mst_barang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mst_barang}}', [
            'id' => $this->bigPrimaryKey(),
            'kategori_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'code' => $this->string(16)->unique()->notNull(),
            'price' => $this->bigInteger()->notNull(),
            'short_description' => $this->text()->comment('Format JSON Array, contoh: ["43 Inch", "Full HD (1920 x 1080)", "USB"]'),
            'long_description' => $this->text()->comment('Format HTML, Penjelasan promosi panjang'),
            'garansi' => $this->string()->comment('contoh: 1 Year Local Official Distributor Warranty'),
            'include' => $this->text()->comment('Format JSON Array, Yang didapatkan pembeli dalam paket, contoh: ["charger", "headset", "kartu garansi"]'),
            'exclude' => $this->text()->comment('Format JSON Array, Yang tidak termasuk dalam paket, contoh: ["charger", "headset", "kartu garansi"]'),
            'spesifikasi' => $this->text()->comment('Format JSON key=>value, contoh: {"Resolusi Layar":"1.920 x 1.080 Full HD", "Tipe Layar":"LED SMART TV"}'),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_mst_barang_kategori', '{{%mst_barang}}', 'kategori_id', '{{%mst_kategori_barang}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mst_barang}}');
    }
}
