<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CRUD_M;

class CrudController extends BaseController
{
    public function index()
    {
		$setdata = new CRUD_M();
		$data['title'] = 'Index Data';
		$data['data'] = $setdata->indexdata();
		echo view('content/index', $data);
    }
	
	public function create()
	{	
        $isDataValid = $this->validate([
			'title' => ['required', 'string'],
			'description' => ['string'],
		]);
		
        // jika data valid, simpan ke database
        if($isDataValid)
		{
            $setdata = new CRUD_M();
			
			date_default_timezone_set('Asia/Jakarta');
		
			$now = date('Y-m-d H:i:s');
			
			$inputdata = [
				"title" => $this->request->getPost('title'),
                "description" => $this->request->getPost('description'),
				"created_at" => $now,
				"is_deleted" => 0,
			];
			
			$checkimage = $this->validate([
				'file' => [
					'uploaded[file]',
					'mime_in[file,image/jpg,image/jpeg,image/png]',
				],
			]);
			
			if($checkimage)
			{
				//belum dapet cara ganti nama file di codeigniter
				$file = $this->request->getFile('file');
				$file->move(ROOTPATH.'public\files');
				
				$inputdata['file'] = $file->getClientName();
			}
			
			$setdata->storedata($inputdata);
            return redirect('/');
        }
		
		//instance manual ? gak ada cara otomatis kek laravel ?
		$data['data'] = [
			'id' => null,
			'title' => null,
			'description' => null,
			'created_at' => null,
			'updated_at' => null,
			'is_deleted' => null,
			'file' => null,
		];
		$data['title'] = 'Create data';
        echo view('content/form', $data);
	}
	
	public function edit($id)
	{
		$setdata = new CRUD_M();
		
		$isDataValid = $this->validate([
			'title' => ['required', 'string'],
			'description' => ['string'],
		]);
		
        // jika data valid, simpan ke database
        if($isDataValid)
		{
			date_default_timezone_set('Asia/Jakarta');
		
			$now = date('Y-m-d H:i:s');
			
			$inputdata = [
				"title" => $this->request->getPost('title'),
                "description" => $this->request->getPost('description'),
				"created_at" => $now,
				"is_deleted" => 0,
			];
			
			$checkimage = $this->validate([
				'file' => [
					'uploaded[file]',
					'mime_in[file,image/jpg,image/jpeg,image/png]',
				],
			]);
			
			if($checkimage)
			{
				//belum dapet cara ganti nama file di codeigniter
				$file = $this->request->getFile('file');
				$file->move(ROOTPATH.'public\files');
				
				$inputdata['file'] = $file->getClientName();
			}
			
			$setdata->updatedata($id, $inputdata);
            return redirect('/');
        }
		
		//instance manual ? gak ada cara otomatis kek laravel ?
		$data['data'] = $setdata->getDataById($id);
		$data['title'] = 'Edit Data '. $data['data']['title'];
        echo view('content/form', $data);
	}
	
	public function destroy($id)
	{
		$setdata = new CRUD_M();
		
		date_default_timezone_set('Asia/Jakarta');
		
		$now = date('Y-m-d H:i:s');

		$inputdata = [
			"updated_at" => $now,
			"is_deleted" => 1,
		];
		
		//$setdata->updatedata($id, $inputdata);
		
		return redirect('/');
	}
}
