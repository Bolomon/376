<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%puk3}}`.
 */
class m190920_101114_create_puk3_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%puk3}}', [
            'id' => $this->primaryKey(),
            'username' => $this->integer(),
            'pass' => $this->string(60)
        ]);
        $this->createIndex(
            'quser',
            'puk3',
            'username'
        );
        $this->createIndex(
            'qpass',
            'puk3',
            'pass'
        );
        $this->createIndex(
            'qpass_h',
            'user',
            'password_hash'
        );
        $this->addForeignKey(
            'fkuser',
            'puk3',
            'username',
            'user',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%puk3}}');
    }
}
