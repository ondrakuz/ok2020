<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'url',
        'title_page',
        'priority',
        'display',
        'web_structure_id',
        'parent_menu_id',
        'type_of_page_id',
        'meta_title',
        'meta_description',
        'meta_key_words',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    public function __construct(array $attributes = []) {
        $this->setTable('menus');
        
        parent::__construct($attributes);
    }
    
    /**
     * Return menu record by url
     *
     * @param  string  $url
     * @return [object]
     */
    public function getByUrl(string $url, $columns = ['*']) {
        $dataObject = static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('url', '=', $url);
            
            //print_r($dataObject); exit;
            for ($i = 0; $i < 250; $i++) {
                if (!empty($dataObject[$i])) {
                    return $dataObject[$i];
                }
            }
    }
    
    /**
     * Return menu record by url
     *
     * @param  string  $url
     * @return [object]
     */
    public function getByDisplayed($columns = ['*']) {
        return DB::table($this->table)
            ->orderBy('priority')
            ->orderBy('id')
            ->get(
                is_array($columns) ? $columns : func_get_args()
                )
            ->where('display', '=', 1);
    }
    
/**
     * Return menu record by ID
     *
     * @param  integer  $id
     * @return [object]
     */
    public function getById(int $id, $columns = ['*']) {
        $dataObject = static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('id', '=', $id);

        for ($i = 0; $i < 250; $i++) {
            if (!empty($dataObject[$i])) {
                return $dataObject[$i];
            }
        }
    }
    
    /**
     * Return menu record which is homepage
     *
     * @return [Menu]
     */
    public function getTitlePage($columns = ['*']) {
        $dataObject = static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('title_page', '=', 1);

        for ($i = 0; $i < 250; $i++) {
            if (!empty($dataObject[$i])) {
                return $dataObject[$i];
            }
        }
    }
    
    /**
     * Return all menu records ordered by priority
     *
     * @return [object]
     */
    public function getAll($columns = ['*']) {
         return DB::table($this->table)
            ->orderBy('priority')
            ->orderBy('id')
            ->select(
                is_array($columns) ? $columns : func_get_args()
            )
            ->get();
    }
}
