<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Enquiry extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'enquiry_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'category' => [
                'type' => 'TEXT',
                'constraint' => 500,
                'null' => false,
            ],
            'mobile' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'purpose' => [
                'type' => 'TEXT',
                'constraint' => 500,
                'null' => false,
            ],

            'name' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'whom_to_meet' => [
                'type' => 'TEXT',
                'constraint' => 500,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'content' => [
                'type' => 'TEXT',
                'constraint' => 500,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('enquiry_id', true);
        $this->forge->createTable('enquiry');
    }

    public function down()
    {
        $this->forge->dropTable('enquiry');
    }
}
