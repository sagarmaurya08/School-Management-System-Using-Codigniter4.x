<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Designation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'designation_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'department_id' => [
                'type' => 'INT',
                'constraint' => 7,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('designation_id', true);
        $this->forge->addForeignKey('department_id', 'department', 'department_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('designation');
    }

    public function down()
    {
        $this->forge->dropTable('designation');
    }
}
