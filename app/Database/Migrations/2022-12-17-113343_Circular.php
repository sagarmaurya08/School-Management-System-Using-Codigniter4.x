<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Circular extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'circular_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'TEXT',
                'constraint' => 200,
                'null' => false,
            ],
            'reference' => [
                'type' => 'TEXT',
                'constraint' => 200,
                'null' => false,
            ],
            'content' => [
                'type' => 'TEXT',
                'constraint' => 200,
                'null' => false,
            ],
            'date' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('circular_id', true);
        $this->forge->createTable('circular');
    }

    public function down()
    {
        $this->forge->dropTable('circular');
    }
}
