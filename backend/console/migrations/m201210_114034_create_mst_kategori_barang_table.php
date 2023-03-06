<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mst_kategori_barang}}`.
 */
class m201210_114034_create_mst_kategori_barang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mst_kategori_barang}}', [
            'id' => $this->primaryKey(),
            'jenis_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'code' => $this->string(50)->unique()->notNull(),
            'tag' => $this->string()->unique()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk_mst_kategori_barang_jenis', '{{%mst_kategori_barang}}', 'jenis_id', '{{%mst_jenis_barang}}', 'id');

        $now = time();

        //Digital Product
        $this->insert('{{%mst_kategori_barang}}', [
            'jenis_id' =>1,
            'name' => 'Pulsa Prabayar',
            'code' => 'PPB',
            'tag' => 'pulsa-prabayar',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);
        $this->insert('{{%mst_kategori_barang}}', [
            'jenis_id' =>1,
            'name' => 'Paket Data',
            'code' => 'PKD',
            'tag' => 'paket-data',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);

        //Office Supplies
        $this->insert('{{%mst_kategori_barang}}', [
            'jenis_id' =>2,
            'name' => 'Printer',
            'code' => 'PRNT',
            'tag' => 'printer',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);
        $this->insert('{{%mst_kategori_barang}}', [
            'jenis_id' =>2,
            'name' => 'Scanner',
            'code' => 'SCNR',
            'tag' => 'scanner',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);

        //Gadget
        $this->insert('{{%mst_kategori_barang}}', [
            'jenis_id' =>3,
            'name' => 'External Storage',
            'code' => 'EXTXTRG',
            'tag' => 'external-storage',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);
        $this->insert('{{%mst_kategori_barang}}', [
            'jenis_id' =>3,
            'name' => 'Monitor',
            'code' => 'MNTR',
            'tag' => 'monitor',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);

        //Elektronik
        $this->insert('{{%mst_kategori_barang}}', [
            'jenis_id' =>4,
            'name' => 'Audio Video',
            'code' => 'AVID',
            'tag' => 'audio-video',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);

        $this->insert('{{%mst_kategori_barang}}', [
            'jenis_id' =>4,
            'name' => 'Televisi',
            'code' => 'TV',
            'tag' => 'televisi',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%mst_kategori_barang}}');
    }
}
