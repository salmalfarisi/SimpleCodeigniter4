<?php

namespace App\Models;

use CodeIgniter\Model;

class CRUD_M extends Model
{
    protected $table = 'cruds';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['title', 'description', 'is_deleted', 'created_at', 'updated_at', 'file'];
	protected $useTimestamps = true;
	
	public function indexdata()
	{
		$sql = "SELECT * from cruds where is_deleted = false";
		$query = $this->db->query($sql);
		$rows = $query->getResult();
		$data = [];
		foreach($rows as $datas)
		{
			$setdata = (array) $datas;
			array_push($data, $setdata);
		}
		
		return $data;
	}
	
	public function storedata($data)
	{
		$query = $this->db->table($this->table)->insert($data);
		return $query;
	}
	
	public function getDataById($id)
	{
		$sql = "SELECT * from cruds where id = '".$id."' and is_deleted = false";
		$query = $this->db->query($sql);
		$rows = $query->getRow();
		$data = (array) $rows;
		
		return $data;
	}
	
	public function updatedata($id, $data)
	{
		$query = $this->db->table($this->table)->update($data, ['id' => $id]);
		return $query;
	}
}