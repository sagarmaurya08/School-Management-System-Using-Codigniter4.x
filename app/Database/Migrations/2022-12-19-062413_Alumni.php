<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alumni extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'alumni_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'sex' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'profession' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'marital_status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'g_year' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'club' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'interest' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('alumni_id', true);
        $this->forge->createTable('alumni');
    }

    public function down()
    {
        $this->forge->dropTable('alumni');
    }
}
