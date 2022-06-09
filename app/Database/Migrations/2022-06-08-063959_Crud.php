<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Crud extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'title' => [
				'type'           => 'VARCHAR',
				'constraint'     => 200,
				'null' 			 => true,
			],
			'description' => [
				'type'           => 'text',
				'null' 			 => true,
			],
			'created_at' => [
				'type'           => 'timestamp',
				'null' 			 => true,
			],
			'updated_at' => [
				'type'           => 'timestamp',
				'null' 			 => true,
			],
			'is_deleted' => [
				'type'           => 'boolean',
				'default' 		 => 0,
			],
			'file' => [
				'type'           => 'VARCHAR',
				'constraint'     => 200,
				'null'           => true,
			],
		]);
		
		$this->forge->addKey('id', true);
		$this->forge->createTable('cruds', true);
    }

    public function down()
    {
        $this->forge->dropTable('cruds');
    }
}
