<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mst_jenis_barang}}`.
 */
class m201210_112838_create_mst_jenis_barang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mst_jenis_barang}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'code' => $this->string(50)->unique()->notNull(),
            'tag' => $this->string()->unique()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        $now = time();

        //1
        $this->insert('{{%mst_jenis_barang}}', [
            'name' => 'Digital Product',
            'code' => 'DP',
            'tag' => 'digital-product',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);

        //2
        $this->insert('{{%mst_jenis_barang}}', [
            'name' => 'Office Supplies',
            'code' => 'OS',
            'tag' => 'office-supplies',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);

        //3
        $this->insert('{{%mst_jenis_barang}}', [
            'name' => 'Gadget',
            'code' => 'GG',
            'tag' => 'gadget',
            'description' => '',
            'created_at' => $now,
            'created_by' => 1,
            'updated_at' => $now,
            'updated_by' => 1,
        ]);

        //4
        $this->insert('{{%mst_jenis_barang}}', [
            'name' => 'Elektronik',
            'code' => 'EL',
            'tag' => 'elektronik',
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
        $this->dropTable('{{%mst_jenis_barang}}');
    }
}
