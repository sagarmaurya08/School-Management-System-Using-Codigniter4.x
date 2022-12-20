<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EnquiryCategory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'enquiry_category_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'category' => [
                'type' => 'TEXT',
                'constraint' => 500,
                'null' => false,
            ],
            'purpose' => [
                'type' => 'TEXT',
                'constraint' => 500,
                'null' => false,
            ],
            'whom' => [
                'type' => 'TEXT',
                'constraint' => 500,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('enquiry_category_id', true);
        $this->forge->createTable('enquiry_category');
    }

    public function down()
    {
        $this->forge->dropTable('enquiry_category');
    }
}
