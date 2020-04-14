<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Article;
use App\TypeOfPage;
use App\Role;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $menuModel = new Menu();
        $articleModel = new Article();
        
        $menus = $menuModel->getAll();
        $menu = $menuModel->getTitlePage();
        $article = $articleModel->getOneByMenuId($menu->id);
        //print_r($article); exit;
        
        switch($menu->type_of_page_id) {
            case TypeOfPage::PAGE:
                $article = $articleModel->where('menu_id', $menu->id)->get()[0];
                return view('article.single', ['article' => $article, 'menus' => $menuModel->getByDisplayed()]);
                break;
            case TypeOfPage::BLOG:
                $articles = $articleModel->where('menu_id', $menu->id)->get();
                return view('article.blog', ['articles' => $articles, 'menus' => $menuModel->getByDisplayed(), 'menu' => $menu]);
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
                    return view('auth.login', ['user' => $this->user, 'menus' => $menuModel->getByDisplayed()]);
                }
        }
    }
}
