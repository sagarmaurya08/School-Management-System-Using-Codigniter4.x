<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bank extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'bank_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'account_holder_name' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],

            'account_number' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'bank_name' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'branch' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('bank_id', true);
        $this->forge->createTable('bank');
    }

    public function down()
    {
        $this->forge->dropTable('bank');
    }
}
