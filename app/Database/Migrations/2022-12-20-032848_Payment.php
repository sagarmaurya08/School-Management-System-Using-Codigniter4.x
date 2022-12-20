<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'payment_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'expense_category_id' => [
                'type' => 'INT',
                'constraint' => 7,
            ],
            'title' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'payment_type' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'invoice_id' => [
                'type' => 'INT',
                'constraint' => 7,
            ],
            'student_id' => [
                'type' => 'INT',
                'constraint' => 7,
            ],
            'method' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'description' => [
                'type' => 'TEXT',
                'constraint' => 500,
                'null' => false,
            ],
            'amount' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'discount' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'timestamp' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'year' => [
                'type' => 'TEXT',
                'constraint' => 100,
                'null' => false,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('payment_id', true);
        $this->forge->createTable('payment');
    }

    public function down()
    {
        $this->forge->dropTable('payment');
    }
}
