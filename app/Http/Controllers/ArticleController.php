<?php

namespace App\Http\Controllers;

use App\Article;
use App\Menu;
use App\Role;
use App\Helpers\RoleHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Requests\Article\UpdateRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    private $menuModel;
    private $articleModel;
    
    private $user = null;
    
    public function __construct() {
        $this->menuModel = new Menu();
        $this->articleModel = new Article();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard()->check() && Auth::user()->role_id < RoleHelper::MODERATOR) {
            $this->user = Auth::user();
            $this->user->role = $this->user->role();
            $articles = $this->articleModel->getAll();
            //print_r($articles); exit;
            return view('article.index', ['articles' => $this->articleModel->getAll(), 'user' => $this->user]);
        } else {
            return redirect()->route('auth.login');
        }
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog(object $articles)
    {
        return view('article.index', ['articles' => $articles]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::guard()->check() && Auth::user()->role_id < RoleHelper::MODERATOR) {
            $this->user = Auth::user();
            $this->user->role = $this->user->role();
            return view('article.create', [
                'menus' => $this->menuModel->getAll(),
                'user' => $this->user,
            ]);
        } else {
            return redirect()->route('auth.login');
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
        if (!empty($arr['published'])) {
            $arr['published'] = 1;
        }
        
        if (Article::create($arr)) {
            return redirect()->route('article.index');
        } else {
            return redirect()->back()->withErrors(['Article has not been saved.']);
        }
    }

    /**
     * Select article and display it
     *
     * @param  Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return view('article.show', ['article' => $article, 'menus' => $this->menuModel->getAll()]);
    }
    
    /**
     * Select article by menu
     *
     * @param  Article $article
     * @return Response
     */
    public function single(Article $article)
    {
        return view('article.single', ['article' => $article]);
    }
    
/**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(string $url)
    {
        if (Auth::guard()->check() && Auth::user()->role_id < RoleHelper::MODERATOR) {
            $this->user = Auth::user();
            $this->user->role = $this->user->role();
            return view('article.edit', [
                'article' => $this->articleModel->getByUrl($url),
                'menus' => $this->menuModel->getAll(),
                'user' => $this->user,
            ]);
        } else {
            return redirect()->route('auth.login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Article $article)
    {
        $arr = $request->toArray();
        if (!empty($arr['published'])) {
            $arr['published'] = 1;
        }
        
        if ($article->update($arr)) {
            return redirect()->route('article.index');
        } else {
            return redirect()->back()->withErrors(['Article did not updated.']);
        }
    }
    
    /**
     * Change published param of article
     *
     * @return \Illuminate\Http\Response
     */
    public function published($url)
    {
        if (Auth::guard()->check() && Auth::user()->role_id < RoleHelper::MODERATOR) {
            $article = $this->articleModel->getByUrl($url);
            $data['published'] = $article->published;
            if ($data['published']) {
                $data['published'] = 0;
            } else {
                $data['published'] = 1;
            }
            $article->fill($data);
            
            if ($article->save()) {
                return redirect()->route('article.index');
            } else {
                return redirect()->back()->withErrors(['Value did not changed.']);
            }
        } else {
            return redirect()->route('auth.login');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($url)
    {
        $article = $this->articleModel->getByUrl($url);
        if ($article->destroy([$article->id])) {
            return redirect()->route('article.index');
        } else {
            return redirect()->back()->withErrors(['Record has not been deleted.']);
        }
    }
    
    /**
     * Return name of attribute, by which is article selected from paramter of route
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'url';
    }
}
