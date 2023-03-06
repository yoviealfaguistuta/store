<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m201210_112512_insert_rbac_data
 */
class m201210_112512_insert_rbac_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->authData();
        $this->userData();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201210_112512_insert_rbac_data cannot be reverted.\n";
        return false;
    }

    protected function authData(){
        $this->insert('auth_item', ['name'=>'Administrator', 'type'=>'1', 'created_at'=>'1586760750', 'updated_at'=>'1586760750']);
        $this->insert('auth_item', ['name'=>'/*', 'type'=>'2', 'created_at'=>'1577706625', 'updated_at'=>'1577706625']);

        $this->insert('auth_item_child', ['parent'=>'Administrator', 'child'=>'/*']);
    }

    /**
     * @throws \yii\base\Exception
     * @throws Exception
     */
    protected function userData(){
        $auth = Yii::$app->authManager;
        $ts = time();
        $this->insert('user', [
            'username' => 'administrator',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('123456'),//R85nfp
            'email' => 'administrator@mail.com',
            'status' => User::STATUS_ACTIVE,
            'created_at' => $ts,
            'updated_at' => $ts,
        ]);
        $auth->assign($auth->getRole('Administrator'), 1);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201210_112512_insert_rbac_data cannot be reverted.\n";

        return false;
    }
    */
}
