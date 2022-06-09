<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Crud extends Seeder
{
    public function run()
    {
		$this->db->table('cruds')->truncate();
		
		date_default_timezone_set('Asia/Jakarta');
		
		$now = date('Y-m-d H:i:s');
        for($i = 0; $i < 4; $i++)
		{
			$this->db->table('cruds')->insert([
				'title' => $i.' datas',
				'description' => $i.' description',
				'created_at' => $now,
				'is_deleted' => false,
			]);
		}
    }
}
