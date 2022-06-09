<?php

namespace App\Controllers;
helper(['testing']); // cara panggil kek import library

class Account extends BaseController
{	
    public function index()
    {
		return view('welcome_message');
    }
	
	public function index2($id)
    {
		$tes = testingHelper('halo2');
		var_dump($tes);
		die();
		return view('welcome_message');
    }
}
