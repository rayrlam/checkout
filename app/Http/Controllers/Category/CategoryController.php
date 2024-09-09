<?php
namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Helpers\CategoryHelper;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {   
        $list = CategoryRepository::list();
        $b8 = CategoryHelper::breadcrumb(8);
        $b5 = CategoryHelper::breadcrumb(5, "/");
        return view('tasks.category.index', ['breadcrumbs'=>[$b8,$b5], 'list'=>$list]);
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
        return view('tasks.category.categories', compact(['categories', 'id', 'pid']));
    }

    public function breadcrumb()
    {
        return view('tasks.category.breadcrumb');
    }

    public function breadcrumbs(Request $request)
    {
        $id = (int) $request->input('id');
        $sep = $request->input('sep') ?: ">";
        $withUrl = $request->input('show') ? true : false;
        $breadcrumbs = CategoryHelper::breadcrumb($id, $sep, $withUrl);
        return view('tasks.category.breadcrumbs', compact(['breadcrumbs']));
    }
}