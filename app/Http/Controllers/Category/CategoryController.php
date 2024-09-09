<?php
namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Helpers\CategoryHelper;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\View;

class CategoryController extends BaseController
{
    private $links;
    private $title = 'Category';

    public function __construct() {
        $this->links =  [
            'index' => '/tasks/category/index',
            'breadcrumb' => '/tasks/category/breadcrumb',
            'categories' => '/tasks/category/categories',
        ];
    }

    public function index()
    {   
        $list = CategoryRepository::list();
        $b8 = CategoryHelper::breadcrumb(8);
        $b5 = CategoryHelper::breadcrumb(5, "/");
        View::share('links', $this->links);
        return view('tasks.category.index', ['breadcrumbs'=>[$b8,$b5], 'list'=>$list, 'title'=>$this->title]);
    }

    public function category(Request $request, $id){
        return $this->categories($request, $id);
    }

    public function categories(Request $request, $id = 0)
    {
        $id = $id === 0 ? 0 : $id;
        if($request->isMethod('post')) {
            $id = $request->input('id');
        }
        $categories = CategoryRepository::categories($id);
        $pid = CategoryRepository::pid();
        $title = $this->title;
        View::share('links', $this->links);
        return view('tasks.category.categories', compact(['categories', 'id', 'pid','title']));
    }

    public function breadcrumb()
    {
        $title = $this->title;
        View::share('links', $this->links);
        return view('tasks.category.breadcrumb', compact('title'));
    }

    public function breadcrumbs(Request $request)
    {
        $title = $this->title;
        View::share('links', $this->links);
        $id = (int) $request->input('id');
        $sep = $request->input('sep') ?: ">";
        $withUrl = $request->input('show') ? true : false;
        $breadcrumbs = CategoryHelper::breadcrumb($id, $sep, $withUrl);
        return view('tasks.category.breadcrumbs', compact(['breadcrumbs','title']));
    }
}