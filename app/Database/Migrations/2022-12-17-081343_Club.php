<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Club extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'club_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'club_name' => [
                'type' => 'TEXT',
                'constraint' => 500,
                'null' => false,
            ],
            'description' => [
                'type' => 'TEXT',
                'constraint' => 500,
                'null' => false,
            ],
            'date' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('club_id', true);
        $this->forge->createTable('club');
    }

    public function down()
    {
        $this->forge->dropTable('club');
    }
}
