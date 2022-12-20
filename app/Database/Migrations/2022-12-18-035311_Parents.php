<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Parents extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'parent_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'profession' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'login_status' => [
                'type' => 'tinyint',
                'constraint' => 3,
                'default'    => '0',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('parent_id', true);
        $this->forge->createTable('parent');
    }

    public function down()
    {
        $this->forge->dropTable('parent');
    }
}
