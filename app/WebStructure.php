<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebStructure extends Model
{
    const HORIZONTAL_MENU = 1;
    const VERTICAL_MENU   = 2;
    const LEFT_BLOCK      = 3;
    const RIGHT_BLOCK     = 4;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'web_structure',
        'switched_on',
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
    
    protected $table;
    
    public function __construct(array $attributes = []) {
        $this->setTable('web_structures');
        parent::__construct($attributes);
    }
    
    /**
     * Return all menu records ordered by priority
     *
     * @return [object]
     */
    public function getSwitchedOn() {
        return DB::table($this->table)->select('*')->get()->whereIn('switched_on', 1);
    }
}
