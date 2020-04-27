<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    
    public function __construct() {
        $this->table = 'roles';
    }
    
    public function getById(int $id, array $columns = ['*']) {
        $dataObject = static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('id', '=', $id);
            
            for ($i = 0; $i < 65535; $i++) {
                if (!empty($dataObject[$i])) {
                    return $dataObject[$i];
                }
            }
    }
    
    public static function getBySlug(string $slug, array $columns = ['*']) {
        $dataObject = static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('slug', '=', $slug);
            
            for ($i = 0; $i < 65535; $i++) {
                if (!empty($dataObject[$i])) {
                    return $dataObject[$i];
                }
            }
    }
}
