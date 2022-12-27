<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Teacher extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'teacher_id' => [
                'type' => 'INT',
                'constraint' => 7,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'teacher_number' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'birthday' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'sex' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'religion' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'blood_group' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'facebook' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'twitter' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'google_plus' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'linkedin' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'qualification' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'marital_status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'file_name' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'department_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'designation_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'date_of_join' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'joining_salary' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'date_of_leaving' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'bank_id' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'login_status' => [
                'type' => 'tinyint',
                'constraint' => 3,
                'default'    => '0',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('teacher_id', true);
        $this->forge->createTable('teacher');
    }

    public function down()
    {
        $this->forge->dropTable('teacher');
    }
}
