<?php

use yii\db\Migration;

class m210801_074030_049_create_logistic_price extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%lgst_price}}', [
            'id' => $this->integer()->notNull()->append('AUTO_INCREMENT PRIMARY KEY')->comment('شناسه'),
            'src_state' => $this->string(190)->notNull()->comment('استان مبدا'),
            'src_city' => $this->string(190)->notNull()->comment('شهر مبدا'),
            'dst_state' => $this->string(190)->notNull()->comment('استان مقصد'),
            'dst_city' => $this->string(190)->notNull()->comment('شهر مقصد'),
            'vanet' => $this->integer()->notNull()->comment('وانت ، نیسان'),
            'khavar' => $this->integer()->notNull()->comment('خاور'),
            'tak' => $this->integer()->notNull()->comment('تک'),
            'joft' => $this->integer()->notNull()->comment('جفت'),
            'tereily' => $this->integer()->notNull()->comment('تریلی'),
            'created_at' => $this->integer()->unsigned()->comment('ایجاد در'),
            'updated_at' => $this->integer()->unsigned()->comment('بروزرسانی در'),
            'created_by' => $this->integer()->comment('ایجاد توسط'),
            'updated_by' => $this->integer()->comment('بروزرسانی توسط'),
        ], $tableOptions);

        $this->createTable('{{%lgst_price_log}}', [
            'id' => $this->integer()->notNull()->append('AUTO_INCREMENT PRIMARY KEY')->comment('شناسه'),
            'cellphone' => $this->string(130)->notNull()->comment('تلفن'),
            'src_state' => $this->string(190)->notNull()->comment('استان مبدا'),
            'src_city' => $this->string(190)->notNull()->comment('شهر مبدا'),
            'dst_state' => $this->string(190)->notNull()->comment('استان مقصد'),
            'dst_city' => $this->string(190)->notNull()->comment('شهر مقصد'),
            'request_type' => $this->string()->notNull()->comment('نوع خودرو'),
            'created_at' => $this->integer()->unsigned()->comment('ایجاد در'),
            'created_by' => $this->integer()->comment('ایجاد توسط'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%lgst_price}}');
    }
}