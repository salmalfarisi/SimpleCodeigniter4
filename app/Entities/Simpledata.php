<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Simpledata extends Entity
{
    protected $datamap = [];
    protected $dates   = ['title', 'description', 'file','created_at', 'updated_at', 'deleted_at', 'is_deleted'];
    protected $casts   = [];
}
