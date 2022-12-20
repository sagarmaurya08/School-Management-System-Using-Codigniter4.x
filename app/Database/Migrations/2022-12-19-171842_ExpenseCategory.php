<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExpenseCategory extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'expense_category_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'TEXT',
                'constraint' => 500,
                'null' => false,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('expense_category_id', true);
        $this->forge->createTable('expense_category');
    }

    public function down()
    {
        $this->forge->dropTable('expense_category');
    }
}
