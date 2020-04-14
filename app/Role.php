<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    const ADMIN      = 1;
    const MANAGER    = 2;
    const MODERATOR  = 3;
    const REGISTERED = 4;
    
    public function __construct() {
        $this->table = 'roles';
    }
    
    public function getById(int $id) {
        return DB::table($this->table)
            ->where('id', '=', $id)
            ->select('*')
            ->get()[0];
    }
}
