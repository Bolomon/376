<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%puk2}}`.
 */
class m190920_094735_create_puk2_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%puk2}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'id_post' => $this->integer()->notNull(),

        ]);
        $this->createIndex(
            'iduser',
            'puk2',
            'id_user'
        );
        $this->createIndex(
            'idupost',
            'puk2',
            'id_post'
        );
        $this->addForeignKey(
            'fkiduser',
            'puk2',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fkidpost',
            'puk2',
            'id_post',
            'post',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%puk2}}');
    }
}
