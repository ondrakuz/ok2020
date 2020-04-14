<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypeOfPage extends Model
{

    const PAGE              = 1;
    const BLOG              = 2;
    const ESHOP             = 3;
    const PHOTOGALERY       = 4;
    const ALL_PHOTOGALERIES = 5;
    const FORUM             = 6;
    const ORDER             = 7;
    const BASKET            = 8;
    const CUSTOMER          = 9;
    const INVOICING         = 10;
    const CONTACT           = 11;
    const USERS             = 12;
    const ADMINISTRATOR     = 13;
    
    public static $pairs = null;
    
    public function __construct(array $attributes = []) {
        $this->setTable('types_of_pages');
        
        parent::__construct($attributes);
    }
    
    /**
     * Get the model from the database by id.
     *
     * @param  integer  $id
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getById($id, $columns = ['*'])
    {
        return static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('id', '=', $id);
    }
    
    /**
     * Get the all models from the database.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll($columns = ['*'])
    {
        return static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            );
    }
    
}
