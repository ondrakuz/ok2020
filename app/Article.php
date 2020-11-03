<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Menu;
use App\User;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
        'published',
        'menu_id',
        'user_id',
        'content',
        'perex',
        'description',
        'key_words',
        'discussion',
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
    
    private $menuModel;
    private $userModel;
    
    public function __construct(array $attributes = []) {
        $this->setTable('articles');
        
        $this->menuModel = new Menu();
        $this->userModel = new User();
        
        parent::__construct($attributes);
    }
    
    /**
     * Return article record by url
     *
     * @param  string  $url
     * @return [object]
     */
    public function getByUrl(string $url, $columns = ['*'])
    {
//         $dataObject = static::query()->get(
//             is_array($columns) ? $columns : func_get_args()
//             )->where('url', '=', $url)->first();
            
//         //print_r($dataObject); exit;
//         for ($i = 0; $i < 250; $i++) {
//             if (!empty($dataObject[$i])) {
//                 return $dataObject[$i];
//             }
//         }
        return static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('url', '=', $url)->first();
    }
    
    /**
     * Return one article record by menu_id
     *
     * @param  string  $url
     * @return [object]
     */
    public function getOneByMenuId(int $menu_id, $columns = ['*'])
    {
//         $dataObject = static::query()->get(
//             is_array($columns) ? $columns : func_get_args()
//             )->where('menu_id', '=', $menu_id)->first();
            
//         //print_r($dataObject); exit;
//         for ($i = 0; $i < 250; $i++) {
//             if (!empty($dataObject[$i])) {
//                 return $dataObject[$i];
//             }
//         }
        return static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('menu_id', '=', $menu_id)->first();
    }
    
    /**
     * Return article records by menu_id
     *
     * @param  string  $url
     * @return [object]
     */
    public function getByMenuId(int $menu_id, $columns = ['*']) {
        return static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('menu_id', '=', $menu_id);
    }
    
    /**
     * Return all articles records
     *
     * @return [object]
     */
    public function getAll($columns = ['*']) {
        $articles = static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            );

        for($i = 0; $i < count($articles); $i++) {
            $articles[$i]->menu_name = $this->menuModel->getById($articles[$i]->menu_id)->name;
            $articles[$i]->nick = $this->userModel->getById($articles[$i]->user_id)->nick;
        }
        return $articles;
        
//         $idx = 0;
//         for($i = 0; $i < 65535; $i++) {
//             if (!empty($articles[$i])) {
//                 $articles[$i]->menu_name = $this->menuModel->getById($articles[$i]->menu_id)->name;
//                 $articles[$i]->nick = $this->userModel->getById($articles[$i]->user_id)->nick;
//                 $idx++;
//             }
//             if ($idx == count($articles)) {
//                 return $articles;
//             }
//         }
    }
    
        /**
     * Return all articles records
     *
     * @return [object]
     */
    public function getPublished(int $menu_id, $columns = ['*']) {
        $articles = static::query()->get(
            is_array($columns) ? $columns : func_get_args()
            )->where('published', 1)->where('menu_id', $menu_id);
        
        $idx = 0;
        for($i = 0; $i < 65535; $i++) {
            if (!empty($articles[$i])) {
                $articles[$i]->menu_name = $this->menuModel->getById($articles[$i]->menu_id)->name;
                $articles[$i]->nick = $this->userModel->getById($articles[$i]->user_id)->nick;
                $idx++;
            }
            if ($idx == count($articles)) {
                return $articles;
            }
        }
    }
    
/**
     * Return name of attribute, by which are selected articles from parameter of route.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'url';
    }
}
