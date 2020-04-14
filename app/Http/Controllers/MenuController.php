<?php

namespace App\Http\Controllers;

use App\Menu;
use App\TypeOfPage;
use App\Article;
use App\Role;
use App\User;
use App\WebStructure;
use Illuminate\Http\Request;
use App\Http\Requests\Menu\StoreRequest;
use App\Http\Requests\Menu\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class MenuController extends Controller
{
    private $menuModel;
    private $typeOfPageModel;
    private $webStructureModel;
    
    private $menus;
    private $user = null;
    
    public function __construct() {
        $this->menuModel = new Menu();
        $this->typeOfPageModel = new TypeOfPage();
        $this->webStructureModel = new WebStructure();
        
        $this->menus = $this->menuModel->getAll();
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard()->check() && Auth::user()->role_id < Role::MODERATOR) {
            $this->user = Auth::user();
            $this->user->role = $this->user->role();
            return view('menu.index', ['menus' => $this->menus, 'user' => $this->user]);
        } else {
            return view('auth.login', ['menus' => $this->menus]);
        }
    }
    
    /**
     * Change priority of menu up.
     *
     * @return \Illuminate\Http\Response
     */
    public function priorityUp($url)
    {
        $menu = $this->menuModel->getByUrl($url);
        $data['priority'] = $menu->priority - 1;
        $menu->fill($data);
        
        if ($menu->save()) {
            return redirect()->route('menu.index');
        } else {
            return redirect()->back()->withErrors(['Value did not changed.']);
        }
    }
    
    /**
     * Change priority of menu up.
     *
     * @return \Illuminate\Http\Response
     */
    public function priorityDown($url)
    {
        $menu = $this->menuModel->getByUrl($url);
        $data['priority'] = $menu->priority + 1;
        $menu->fill($data);
        
        if ($menu->save()) {
            return redirect()->route('menu.index');
        } else {
            return redirect()->back()->withErrors(['Value did not changed.']);
        }
    }
    
    /**
     * Change display param of menu
     *
     * @return \Illuminate\Http\Response
     */
    public function display($url)
    {
        $menu = $this->menuModel->getByUrl($url);
        $data['display'] = $menu->display;
        if ($data['display']) {
            $data['display'] = 0;
        } else {
            $data['display'] = 1;
        }
        $menu->fill($data);
        
        if ($menu->save()) {
            return redirect()->route('menu.index');
        } else {
            return redirect()->back()->withErrors(['Value did not changed.']);
        }
    }
    
    /**
     * Change priority of menu up.
     *
     * @return \Illuminate\Http\Response
     */
    public function titlePage($url)
    {
        $menu = $this->menuModel->getByUrl($url);
        $tp = $this->menuModel->getTitlePage();
        $data['title_page'] = $menu->title_page;
        if (!$data['title_page']) {
            $data['title_page'] = 1;
            $menu->fill(['title_page' => 1]);
            $tp->fill(['title_page' => 0]);
        }
        $menu->fill($data);
        
        if ($menu->save() && $tp->save()) {
            return redirect()->route('menu.index');
        } else {
            return redirect()->back()->withErrors(['Value did not changed.']);
        }
    }
    
    /**
     * Change priority of menu up.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($url)
    {
        $menu = $this->menuModel->getByUrl($url);
        if ($menu->destroy([$menu->id])) {
            return redirect()->route('menu.index');
        } else {
            return redirect()->back()->withErrors(['Record has not been deleted.']);
        }
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard()->check() && Auth::user()->role_id < Role::MODERATOR) {
            $this->user = Auth::user();
            $this->user->role = $this->user->role();
            return view('menu.create', [
                'menus' => $this->menus,
                'user' => $this->user,
                'webStructures' => $this->webStructureModel->getSwitchedOn(),
                'typesOfPages' => $this->typeOfPageModel->getAll(),
            ]);
        } else {
            //return redirect()->route('auth.login');
            return view('auth.login', ['menus' => $this->menus]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {  
        $arr = $request->toArray();
        if (!empty($arr['display'])) {
            $arr['display'] = 1;
        }
        if (!empty($arr['title_page'])) {
            $arr['title_page'] = 1;
            
            $tp = $this->menuModel->getTitlePage();
            $tp->fill(['title_page' => 0]);
            
            if (!$tp->save()) {
                return redirect()->back()->withErrors(['Record could not been saved, because it is not possible change title page.']);
            }
        }
        
        if (!Menu::create($arr)) {
            return redirect()->back()->withErrors(['Record could not been saved.']);
        }
        return redirect()->route('menu.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  string  $url
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        //echo("SHOW"); exit;
        $articleModel = new Article();
        
        $menu = $this->menuModel->getByUrl($url);
        //print_r($menu); exit;
        
        switch($menu->type_of_page_id) {
            case TypeOfPage::PAGE:
                $article = $articleModel->where('menu_id', $menu->id)->get()[0];
                return view('article.single', ['article' => $article, 'menus' => $this->menuModel->getByDisplayed()]);
                break;
            case TypeOfPage::BLOG:
                $articles = $articleModel->getPublished($menu->id);
                return view('article.blog', ['articles' => $articles, 'menus' => $this->menuModel->getByDisplayed(), 'menu' => $menu]);
                break;
            case TypeOfPage::ESHOP:
                return view('article.show', ['article' => $article, 'menus' => $this->menus]);
                break;
            case TypeOfPage::PHOTOGALERY:
                return view('article.show', ['article' => $article, 'menus' => $this->menus]);
                break;
            case TypeOfPage::ALL_PHOTOGALERIES:
                return view('article.show', ['article' => $article, 'menus' => $this->menus]);
                break;
            case TypeOfPage::FORUM:
                return view('article.show', ['article' => $article, 'menus' => $this->menus]);
                break;
            case TypeOfPage::ORDER:
                return view('article.show', ['article' => $article, 'menus' => $this->menus]);
                break;
            case TypeOfPage::BASKET:
                return view('article.show', ['article' => $article, 'menus' => $this->menus]);
                break;
            case TypeOfPage::CUSTOMER:
                return view('article.show', ['article' => $article, 'menus' => $this->menus]);
                break;
            case TypeOfPage::INVOICING:
                return view('article.show', ['article' => $article, 'menus' => $this->menus]);
                break;
            case TypeOfPage::CONTACT:
                return view('article.show', ['article' => $article, 'menus' => $this->menus]);
                break;
            case TypeOfPage::USERS:
                if (Auth::guard()->check()) {
                    $user = Auth::user();
                    return view('auth.logged', ['menus' => $this->menuModel->getByDisplayed(), 'user' => $user]);
                }
                return view('auth.login', ['menus' => $this->menuModel->getByDisplayed()]);
                break;
            case TypeOfPage::ADMINISTRATOR:
                if (Auth::guard()->check() && Auth::user()->role_id < Role::MODERATOR) {
                    $this->user = Auth::user();
                    $this->user->role = $this->user->role();
                    return view('admin.welcome', ['user' => $this->user]);
                } else {
                    //return redirect()->route('auth.login');
                    return view('auth.login', ['user' => $this->user, 'menus' => $this->menuModel->getByDisplayed()]);
                }
        }
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(string $url)
    {
        if (Auth::guard()->check() && Auth::user()->role_id < Role::MODERATOR) {
            $this->user = Auth::user();
            $this->user->role = $this->user->role();
            $menu = $this->menuModel->getByUrl($url);
            return view('menu.edit', [
                'menu' => $menu,
                'user' => $this->user,
                'menus' => $this->menus,
                'webStructures' => $this->webStructureModel->getSwitchedOn(),
                'typesOfPages' => $this->typeOfPageModel->getAll(),
            ]);
        } else {
            return view('auth.login', ['menus' => $this->menus]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Menu $menu)
    {
        $arr = $request->toArray();
        if (!empty($arr['display'])) {
            $arr['display'] = 1;
        }
        if (!empty($arr['title_page'])) {
            $arr['title_page'] = 1;
        }
        
        if ($menu->update($arr)) {
            return redirect()->route('menu.index');
        } else {
            return redirect()->back()->withErrors(['Menu Item did not updated.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
